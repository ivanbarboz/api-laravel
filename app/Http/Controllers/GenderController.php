<?php

namespace App\Http\Controllers;

use App\Http\Requests\createGender;
use App\Models\Gender;
use Illuminate\Http\Request;

class GenderController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:genders.index')->only('index');
        $this->middleware('can:genders.store')->only(['store']);
        $this->middleware('can:genders.update')->only(['update']);
        $this->middleware('can:genders.delete')->only(['delete']);
    }

    //funcion para mostrar nuestros generos
    public function index()
    {
        $gender = Gender::get();
        return response()->json($gender);
    }

    //funcion para crear un nuevo genero
    public function store(createGender $request)
    {
        $gender = Gender::create($request->all());
        return response()->json(['message'=>'genero creado\n',$gender]);
    }
    

    //funcion para actualizar un genero
    public function update($id, Request $request)
    {
        $gender = Gender::find($id);
        $gender->update($request->all());
        return response()->json(['message'=>'genero autializado con exito\n',
                                  'gender'=>$gender]);
    }

    public function delete($id)
    {
        $gender = Gender::destroy($id);
        return response()->json(['message'=>'genero eliminado\n',$gender]);

    }
}
