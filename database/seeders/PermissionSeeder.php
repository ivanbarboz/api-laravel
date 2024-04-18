<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name'=>'user.index'])->syncRoles('User');
        Permission::create(['name'=>'book.create'])->syncRoles('Author');
        Permission::create(['name'=>'loan.update'])->syncRoles('Librarian');
        Permission::create(['name'=>'author.index'])->syncRoles('Admin');


    }
}
