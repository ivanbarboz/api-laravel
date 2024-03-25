<?php

namespace App\Http\Controllers;
use App\Models\User;


use Illuminate\Http\Request;

class UserController extends Controller
{
        //mostrar todos los datos de users
    public function index(){
    $users = User::get();
    return response()->json($users);
    }
    //actualiza las columnas users
    public function update($id, Request $request){
        $user = User::find($id);
        $user->update($request->all());
        return response()->json(['message'=> 'el nombre se a actualizado']);
    }
    //elimina las columnas usesr que no tengan dependencias
    public function delete($id){
        $user = User::destroy($id);
        return response()->json(['message'=> 'usuario eliminado']);
    }
    //crea un nuevo user
    public function create(Request $request){
        $user = User::create($request->all());
        return response()->json(['message'=> 'usuario creado']);
        //$users = User::get();
        //return response()->json();
        /* 
        $user = new User();
        $user->fill($request->all());
        $user->save();
        return response()->json(['message'=> 'usuario creado']);*/

    }

     
    
}
