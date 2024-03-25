<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    //
    public function index(){
        $loan = Loan::get();
        return response()->json($loan);
    }
    public function create(Request $request){
        $loan = Loan::create($request->all());
        return response()->json(['response', 'prestamo creado correctamente']);
    }
    public function update($id, Request $request){
        $loan = Loan::find($id);
        $loan->update($request->all());
        return response()->json(['message', 'prestamos actualizado']);
    }
}
