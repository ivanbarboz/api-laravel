<?php
namespace App\Services;

use App\Models\Loan;
use App\Models\Specimen;
use App\Models\User;
use GuzzleHttp\Psr7\Request;

class LoanService{

    public function index()
    {
        $loans = Loan::get();
        return response()->json($loans);
    }

    
    public function update($id, $request)
    {
        $loan = Loan::find($id);
        $loan->update($request->all());
    }

    public function deleet(User $user)
    {
        $user->delete();
        return ('usuario eliminado con exito');
    }

    /*
    public function store(Request $request)
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
    }*/

}