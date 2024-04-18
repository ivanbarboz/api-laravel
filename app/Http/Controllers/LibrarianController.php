<?php

namespace App\Http\Controllers;

use App\Http\Resources\LibrarianResource;
use App\Models\Librarian;
use Illuminate\Http\Request;

class LibrarianController extends Controller
{
    public function index(){
        $librarian = Librarian::with('roles')->get();
        return LibrarianResource::collection($librarian);
    }


    public function store(Request $request){
       /*return Librarian::firstOrCreate(
            ['name'=>$request->name],
        
            ['name'=>$request->name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'cell_phone'=>$request->cell_phone,
            'address'=>$request->address]
        );*/

       /* return Librarian::updateOrCreate(
            ['name'=>$request->name],
            
            ['name'=>$request->name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'cell_phone'=>$request->cell_phone,
            'address'=>$request->address]
        );*/
    
    

        /*$librarian  = Librarian::firstOrNew(
            ['name'=>$request->name],
            
            ['name'=>$request->name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'cell_phone'=>$request->cell_phone,
            'address'=>$request->address],
        );
        $librarian->save();
        return response()->json($librarian);
*/

      /*  $librarian = Librarian::whereName($request->name)->first();
        if(!$librarian) return Librarian::create($request->all());
        return response()->json($librarian);*/

    }

    public function destroy(Librarian $librarian){
        return Librarian::destroy($librarian->id);
    }

    public function restore(int $id){
        return Librarian::onlyTrashed()->find($id)->restore();
    }
    
}
