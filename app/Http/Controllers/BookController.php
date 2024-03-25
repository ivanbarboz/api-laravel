<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class BookController extends Controller
{
    
    public function index(){
        $books = Book::select('b.id', 'b.title', DB::raw("CONCAT(a.name, ' ', a.last_name) as author_fullname"),'g.name as gender_name')
                    ->from('books as b')
                    ->join('genders as g', 'b.gender_id', '=', 'g.id')
                    ->join('authors as a', 'b.author_id', '=', 'a.id')
                    ->get();
        
        return response()->json($books);
    }

    public function filter(Request $request) {
        $gender = $request->input('gender');
    
        $books = Book::whereHas('gender', function ($query) use ($gender) {
                $query->where('name', $gender);
            })
            ->get();
    
        return response()->json($books);
    }
    
    
}
