<?php
namespace App\Services;

use App\Models\Author;
use GuzzleHttp\Psr7\Request;

class AuthorService{

    public function index(){
        $authors = Author::get();
        return response()->json($authors);
    }
    
    public function store(array $request)
    {
        $author = Author::create($request);
        return $author;
    }

    public function update($id, $request)
    {
        $author = Author::find($id);
        $author->update($request->all());
    }
}
