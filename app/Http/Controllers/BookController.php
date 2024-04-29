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
    //creamos un constructor para acceder a nuestros servivios
   public function __construct(private BookService $bookService)
   {
    //autenticamos nuestras rutas
    $this->bookService = $bookService;
    $this->middleware('can:index.book')->only('index');
    $this->middleware('can:create.book')->only(['create']);
    $this->middleware('can:update.book')->only(['update']);
    $this->middleware('can:delete.book')->only(['delete']);
   }

   // funcion para mostrar nuestros libros en formato json utilizando nuestro servicio
   public function index()
   {
    $books = $this->bookService->index();
    return BookResource::collection($books);
   }

   //funcion para crear un nuevo libro utilizando nuestro servicio
   public function create( Request $request)
   {
    $books = $this->bookService->store($request->all());
    return response()->json($books);
    }

    //funcion para eliminar un libro utilizamos nuestro servicio
    public function delete (Book $id)
    {
    $books = $this->bookService->delete($id);
    return response()->json(['mesage'=> $books ]);
    }

    //funcion para actualizar un libro utilizando nuestro servicio
public function update(Request $request, $id)
    {
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


// filtramos un libro por su genero y author
    public function filter(Request $request)
    {
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

    
    
}
