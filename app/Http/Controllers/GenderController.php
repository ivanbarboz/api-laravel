<?php

namespace App\Http\Controllers;

use App\Http\Requests\createGender;
use App\Models\Gender;
use Illuminate\Http\Request;

class GenderController extends Controller
{

    //funcion para mostrar nuestros generos
    public function index()
    {
        $gender = Gender::get();
        return response()->json($gender);
    }

    //funcion para crear un nuevo genero
    public function create(createGender $request)
    {
        $gender = Gender::create($request->all());
        return response()->json($gender);
    }
    
}
