<?php

namespace App\Http\Controllers;

use App\Models\Specimen;
use Illuminate\Http\Request;

class SpecimenController extends Controller
{
    //
    public function index(){
        $specimen = Specimen::get();
        return response()->json($specimen);
    }
    public function update($id, Request $request){
        $specimen = Specimen::find($id);
        $specimen->update($request->all());
        return response()->json(['message','ejemplar actualizado correctamente']);
    }

    public function delete($id){
        $specimen = Specimen::destroy($id);
        return response()->json(['messaje'], 'specimen eliminada');
    }
    public function create(Request $request){
        $specimen = Specimen::create($request->all());
        return response()->json(['messaje', 'specimen creada']);
    }
}
