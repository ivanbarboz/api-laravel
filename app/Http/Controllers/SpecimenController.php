<?php

namespace App\Http\Controllers;

use App\Models\Specimen;
use Illuminate\Http\Request;

class SpecimenController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:specimens.index')->only(['index']);
        $this->middleware('can:specimens.store')->only(['store']);
        $this->middleware('can:specimens.update')->only(['update']);
        $this->middleware('can:specimens.delete')->only(['delete']);
    }
    //funcion para mostrar las especies o copias
    public function index()
    {
        $specimen = Specimen::get();
        return response()->json($specimen);
    }

    //funcion para acutlizar una copia
    public function update($id, Request $request)
    {
        $specimen = Specimen::find($id);
        $specimen->update($request->all());
        return response()->json(['message','ejemplar actualizado correctamente']);
    }


    //funcion para eliminar una copia
    public function delete($id)
    {
        $specimen = Specimen::destroy($id);
        return response()->json(['messaje'], 'specimen eliminada');
    }

    //funcion para crear una copia
    public function store(Request $request)
    {
        $specimen = Specimen::create($request->all());
        return response()->json(['messaje', 'specimen creada']);
    }
}
