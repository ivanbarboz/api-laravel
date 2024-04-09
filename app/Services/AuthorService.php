<?php
namespace App\Services;

use App\Models\Author;
use GuzzleHttp\Psr7\Request;

class AuthorService{
    
    public function create(array $request){
        $author = Author::create($request);
        return $author;
    }
}
