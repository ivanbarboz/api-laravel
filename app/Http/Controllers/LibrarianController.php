<?php

namespace App\Http\Controllers;

use App\Http\Resources\LibrarianResource;
use App\Models\Librarian;
use Illuminate\Http\Request;

class LibrarianController extends Controller
{
    public function index(){
        $librarian = Librarian::with('roles')->get();
        return LibrarianResource::collection($librarian);
    }
}
