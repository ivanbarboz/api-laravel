<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\AuthorPhoto;
use App\Services\UserService;
use Illuminate\Http\Request;

class AuthorPhotoController extends Controller
{
    //funcion para guardar una imagen en nuestra base de datos
    public function storeFile(Request $request)
    {
         AuthorPhoto::create([
            'uri' => $request->file('photo')->store('authors', 'public'),
            'author_id' => $request->book_id,
        ]);
        return response()->json(['exito']);
    }

}
