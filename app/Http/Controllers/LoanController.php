<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Specimen;
use App\Models\Statu;
use Illuminate\Http\Request;
use Termwind\Components\Span;

class LoanController extends Controller
{
    //
    public function index(){
        $loan = Loan::get();
        return response()->json($loan);
    }
    
    public function create(Request $request) {
        $specimen_id = $request->input('specimen_id');
        $specimen = Specimen::find($specimen_id);
    
        if ($specimen) {
            if ($specimen->statu_id === 4) {
                // Crear el préstamo
                $loan = Loan::create($request->all());
                $specimen->statu_id = 2;
                $specimen->save();
                return response()->json(['message' => 'Préstamo creado exitosamente']); 
            } else {
                return response()->json(['error' => 'El ejemplar no está disponible para préstamo']);
            }
        } else {
            return response()->json(['error' => 'No se encontró el ejemplar']);
        }
    }
    

    public function update($id, Request $request){
        $loan = Loan::find($id);
        $loan->update($request->all());
        return response()->json(['message', 'prestamos actualizado']);
    }
}
