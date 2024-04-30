<?php

namespace App\Http\Controllers;

use App\Models\Statu;
use Illuminate\Http\Request;

class StatuController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:status.index')->only('index');
    }

    public function index()
    {
        $statu = Statu::get();
        return response()->json($statu);
    }
    
}
