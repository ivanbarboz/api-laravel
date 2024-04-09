<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Models\Gender;
use App\Services\BookService;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class BookController extends Controller
{
   public function __construct(private BookService $bookService)
   {
    $this->bookService = $bookService;
   }

   public function index(){
    $books = $this->bookService->index();
    return BookResource::collection($books);
   }

   public function create( Request $request){
    $books = $this->bookService->create($request->all());
    return response()->json($books);
}

public function delete (Book $id){
    $books = $this->bookService->delete($id);
    return response()->json(['mesage'=> $books ]);
}

public function update(Request $request, $id){
    $books = $this->bookService->update($id, $request);
    return response()->json($books);
}

    /*public function index(){
        $books = Book::get();
    $books->transform(function ($book) {
            return [
                'id' => $book->id,
                'title' => $book->title,
                'gender_name' => $book->gender->name ,
                'auhor'=> $book->author->name 
            ];
        });
        return BookResource::collection($books);
    }*/


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
