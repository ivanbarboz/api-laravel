<?php
namespace App\Services;

use App\Models\Book;


class BookService{
    public function index(){
        $books = Book::get();
        return ($books);
    }

    public function store(array $bookData){
        $books = Book::create($bookData);
        return ($books);
    }

    public function update($id, $request){
        $book = Book::find($id);
        $book->update($request->all());
        return $book;
    }

    
    public function delete(Book $book){
        $book->delete();
        return ('libro eliminado');
    }
}