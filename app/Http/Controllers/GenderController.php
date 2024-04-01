<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use Illuminate\Http\Request;

class GenderController extends Controller
{
    public function index(){
        $gender = Gender::get();
        return response()->json($gender);
    }
    
    
}
