<?php

namespace Database\Seeders;

use App\Models\Librarian;
use App\Models\LibrarianRole;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LibrarianRoleSeeder extends Seeder
{
    public function run()
    {
        // Obtén algunos bibliotecarios y roles existentes
        $librarians = Librarian::all();
        $roles = Role::all();

        // Itera sobre cada bibliotecario y asigna aleatoriamente algunos roles
        $librarians->each(function ($librarian) use ($roles) {
            $librarian->roles()->attach(
                $roles->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
