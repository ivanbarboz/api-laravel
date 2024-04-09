<?php

namespace App\Http\Controllers;

use App\Http\Requests\createGender;
use App\Models\Gender;
use Illuminate\Http\Request;

class GenderController extends Controller
{
    public function index(){
        $gender = Gender::get();
        return response()->json($gender);
    }
    public function create(createGender $request){
        $gender = Gender::create($request->all());
        return response()->json($gender);
    }
    
}
