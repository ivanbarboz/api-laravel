<?php

namespace App\Http\Controllers;

use App\Enums\RoleEnum;
use App\Http\Resources\UserCollection;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //creamos un constructor para usar nuestros servicios
    public function __construct(private UserService $userService)
    {
        $this->userService = $userService;
    }
        //mostrar todos los datos de users
    public function index(){
        $users = $this->userService->index();
        return response()->json($users);
    }


    
    //actualiza las columnas users
    public function update(Request $request, User $id)
    {
        $user = $this->userService->update($id, $request);
        return response()->json($user);
    }
    //elimina las columnas usesr que no tengan dependencias
    public function delete(User $id)
    {
        $users = $this->userService->delete($id);
        return response()->json(['message' => $users]);
    }
    //crea un nuevo user
    public function store(Request $request)
    {
        $user = $this->userService->store($request->all())->assignRole(RoleEnum::ADMIN->value);
        return response()->json($user, 201); 
    }
    
    
    
    
}
