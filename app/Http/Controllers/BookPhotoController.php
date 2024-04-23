<?php

namespace App\Http\Controllers;

use App\Models\BookPhoto;
use App\Traits\Base64Decodable;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookPhotoController extends Controller
{
    use Base64Decodable;

    public function storeFile(Request $request)
    {
        return BookPhoto::create([
            'uri' => $request->file('photo')->store('posts', 'images'),
            'post_id' => 1,
        ]);
    }

    public function storeBase64(Request $request)
    {
        return BookPhoto::create([
            'uri' => $this->saveImage($request->photo, 'posts', Str::uuid()),
            'post_id' => 1,
        ]);
    }
}
