<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthenticatedController extends Controller
{
    public function store(LoginRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            return response()->json(['token' => $request->user()->createToken('token')->plainTextToken], Response::HTTP_OK);
        } else {
            return response()->json(['message' => 'Credenciales inválidas.'], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function destroy(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return new JsonResponse(['message' => 'Cerró sesión exitosamente'], Response::HTTP_OK);
    }
}
