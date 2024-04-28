<?php

namespace App\Http\Controllers;

use App\Models\BookPhoto;
use App\Traits\Base64Decodable;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookPhotoController extends Controller
{
    //use Base64Decodable;

    public function storeFile(Request $request)
    {
         BookPhoto::create([
            'uri' => $request->file('photo')->store('books', 'public'),
            'book_id' => $request->book_id,
        ]);
        return response()->json(['exito']);
    
    }

     /*public function storeBase64(Request $request)
     {
         return BookPhoto::create([
             'book_id' =>$request->book_id,
         ]);
         return response()->json(['exito']);
     }*/
}
