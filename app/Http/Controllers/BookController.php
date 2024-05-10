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
    $this->middleware('can:books.index')->only('index');
    $this->middleware('can:books.store')->only(['store']);
    $this->middleware('can:books.update')->only(['update']);
    $this->middleware('can:books.delete')->only(['delete']);
   }

   // funcion para mostrar nuestros libros en formato json utilizando nuestro servicio
   public function index()
   {
    //return response()->json( Book::with('gender','author')->get());
    $books = $this->bookService->index();
    return BookResource::collection($books);
   }

   //funcion para crear un nuevo libro utilizando nuestro servicio

   public function store(Request $request)
    {
        // Verificar si existe un libro eliminado con el mismo título
        $deletedBook = Book::withTrashed()->where('title', $request->input('title'))->first();

        if ($deletedBook) {
            // Restaurar el libro eliminado con los datos actualizados
            $deletedBook->fill($request->all());
            $deletedBook->restore();
            return response()->json(['message' => 'Libro restaurado con éxito']);
        } else {
            // Crear un nuevo libro
            $book = Book::create($request->all());
            return response()->json(['message'=>'libro creado con exito\n',
                            'book'=>$book]);
        }
    }
   

    //funcion para eliminar un libro utilizamos nuestro servicio
    public function delete (Book $id)
    {
    $this->bookService->delete($id);
    return response()->json(['mesage'=>'el libro se elimino correctamente']);
    }

    //funcion para actualizar un libroio
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json(['error' => 'libro no encontrado'], 404);
        }
        $book->delete();
        $newBook = Book::create($request->all());
        return response()->json(['message' => 'libro actualizado y eliminado con éxito', 'data' => $newBook]);
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

   /* public function bookdate(Request $request)
    {
        // Obtener la fecha de creación desde el parámetro de la URL
        $fecha = $request->input('fecha');
        // Obtener los libros creados desde la fecha especificada hasta hoy
        $libros = Book::whereDate('created_at', '>=', $fecha)->get();
        return response()->json($libros);
    }*/

    
    
}
