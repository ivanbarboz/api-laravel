<?php
namespace App\Services;

use App\Models\User;


class UserService
{
    public function index(){
        $user = User::get();
        return $user;
    }

    public function create(array $userData){
        $user = User::create($userData);
        return $user;
    }

    public function update($id, $request){
        $user = User::find($id);
        $user->update($request->all());
        return $user;
    }

    public function delete(User $user)
    {
        $user->delete();
        return 'Usuario eliminado con éxito';
    }
}