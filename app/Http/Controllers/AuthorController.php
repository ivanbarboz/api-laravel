<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Services\AuthorService;
use Illuminate\Http\Request;


class AuthorController extends Controller
{
    //constructor para acceder a los servicios
public function __construct(private AuthorService $authorService)
{
    $this->authorService = $authorService;
    $this->middleware('can:authors.index')->only('index');
    $this->middleware('can:authors.store')->only(['store']);
    $this->middleware('can:authors.update')->only(['update']);
    $this->middleware('can:authors.delete')->only(['delete']);
}
    // funcion para crear un nuevo author utilizando nuestro servicio
    public function store(Request $request)
    {
        $authors = $this->authorService->store($request->all());
        return response()->json(['message'=>'author creado con exito\n',
                                'author'=>$authors]);
    }

    // funcion para actualizar los datos del author
    public function update($id, Request $request )
    {
        $author = Author::find($id);
        $author->update($request->all());
        return response()->json(['message'=>'actualizacion exitosa\n',
                                'author'=>$author]);
    }

    //funcion para eliminar un author
    public function delete($id)
    {
        $author = Author::destroy($id);
        return response(['auhtor eliminado con exito']);
    }
    

    //funcion para mostrar todos los authores
    public function index()
    {
        $authors = Author::get();
        return response()->json($authors);
    }
}
