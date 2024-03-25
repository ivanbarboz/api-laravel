<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;


class AuthorController extends Controller
{
    public function index(){
        $authors = Author::get();
        return response()->json($authors);
    }

    public function update($id, Request $request ){
        $author = Author::find($id);
        $author->update($request->all());
        return response()->json(['message'=>'actualizacion exitosa']);

    }
    
}
