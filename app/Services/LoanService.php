<?php
namespace App\Services;

use App\Models\Loan;
use App\Models\User;
use GuzzleHttp\Psr7\Request;

class LoanService{

    public function index()
    {
        $loans = Loan::get();
        return response()->json($loans);
    }

    public function store(array $bookData)
    {
        $loan =  Loan::create($bookData);
        return response()->json($loan);
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

}