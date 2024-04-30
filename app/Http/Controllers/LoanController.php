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
            $this->middleware('can:loans.index')->only('index');
            $this->middleware('can:loans.store')->only('store');
            $this->middleware('can:loans.update')->only('update');
            $this->middleware('can:loans.delete')->only('delete');
            
        }

        //funcion para crear un nuevo prestamo
    public function store(Request $request)
    {
        $specimen_id = $request->input('specimen_id');
        $specimen = Specimen::find($specimen_id);
    
        if ($specimen) {
            if ($specimen->statu_id === 2) {
                // Crear el préstamo
                $loan = Loan::create($request->all());
                $specimen->statu_id = 1;
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
    public function update(Request $request, $id)
    {
        $loan = Loan::find($id);
        if (!$loan) {
            return response()->json(['error' => 'Préstamo no encontrado'], 404);
        }
        // Verificar si el préstamo cumple con los criterios de elegibilidad
        if ($loan->statu_id != 3) {
            // El préstamo no cumple con los criterios de elegibilidad, por lo que se deniega la actualización
            return response()->json(['error' => 'No se puede concluir un préstamo que no está en estado "concluido"'], 422);
        }
        // El préstamo cumple con los criterios de elegibilidad, por lo que se permite la actualización
        $loan->update($request->all());
        return response()->json(['message' => 'Préstamo actualizado con éxito']);
    }

    //funcion para mostrar los prestamos
    public function index()
    {
        $loans = Loan::get();
        return LoanResource::collection($loans);
    }

    public function delete($id, Request $request)
    {
    $loan = Loan::find($id);
        if (!$loan) {
            return response()->json(['message' => 'El préstamo no existe'], 404);
        }
        Loan::destroy($id);
        $specimen_id = $request->input('specimen_id');
        $specimen = Specimen::find($specimen_id);
        if (!$specimen) {
            return response()->json(['message' => 'El ejemplar no existe'], 404);
        }
        if ($specimen->statu_id == 1) {
            $specimen->statu_id = 2;
            $specimen->save();
            return response()->json(['message' => 'Préstamo eliminado y estado del ejemplar actualizado']);
        }
    }

}
