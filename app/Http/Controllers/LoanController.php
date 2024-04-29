<?php

namespace App\Http\Controllers;

use App\Http\Resources\LoanCollection;
use App\Http\Resources\LoanResource;
use App\Models\Loan;
use App\Models\Specimen;
use App\Models\Statu;
use Illuminate\Http\Request;
use Termwind\Components\Span;

class LoanController extends Controller
{

    //autenticacion de rutas
    public function __construct()
        {
            $this->middleware('can:index.loan')->only('index');
            $this->middleware('can:create.loan')->only('create');
            $this->middleware('can:update.loan')->only('update');
            $this->middleware('can:delete.loan')->only('delete');
            
        }

        //funcion para crear un nuevo prestamo
    public function create(Request $request)
    {
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
        

    //funcion para actualizar un prestamo
    public function update($id, Request $request)

    {
        $loan = Loan::find($id);
        $loan->update($request->all());
        return response()->json(['message', 'prestamos actualizado']);
    }

    //funcion para mostrar los prestamos
    public function index()
    {
        $loans = Loan::get();
        return LoanResource::collection($loans);
    }
}
