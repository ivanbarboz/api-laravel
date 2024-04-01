<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Gender;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class BookController extends Controller
{
    
    public function index(){
        $books = Book::get();
        $books->transform(function ($book) {
            return [
                'id' => $book->id,
                'title' => $book->title,
                'gender_name' => $book->gender->name ,
                'auhor'=> $book->author->name 
            ];
        });
        return response()->json($books);
    }


// filtrar por genero
    public function filter(Request $request){
    $genderName = $request->input('gender_name','');
    $gender = Gender::where('name', $genderName)->first();
    if ($gender) {
        $books = Book::with('gender', 'author')->where('gender_id', $gender->id)->get();
        $books->transform(function ($book) {
            return [
                'id' => $book->id,
                'title' => $book->title,
                'gender_name' => $book->gender->name,
                'author' => $book->author->name 
            ];
        });
        return response()->json($books);
    } else {
        return response()->json(['error' => 'El género no existe'], 404);
    }
}

    //http://127.0.0.1:8000/books/filter?gender_name=Ficción
    
}
