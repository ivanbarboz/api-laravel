<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Services\AuthorService;
use Illuminate\Http\Request;


class AuthorController extends Controller
{
public function __construct(private AuthorService $authorService)
{
    $this->authorService = $authorService;
}

    public function store(Request $request){
        $authors = $this->authorService->store($request->all());
        return response()->json($authors, 201);
    }

    public function update($id, Request $request ){
        $author = Author::find($id);
        $author->update($request->all());
        return response()->json(['message'=>'actualizacion exitosa']);

    }
    
}
