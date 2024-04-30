<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
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
        Permission::create(['name'=>'books.store'])->syncRoles([RoleEnum::ADMIN->value]);
        Permission::create(['name'=>'books.index'])->syncRoles([RoleEnum::ADMIN->value]);
        Permission::create(['name'=>'books.delete'])->syncRoles([RoleEnum::ADMIN->value]);
        Permission::create(['name'=>'books.update'])->syncRoles([RoleEnum::ADMIN->value]);
        
        Permission::create(['name'=>'authors.store'])->syncRoles([RoleEnum::ADMIN->value]);
        Permission::create(['name'=>'authors.index'])->syncRoles([RoleEnum::ADMIN->value]);
        Permission::create(['name'=>'authors.update'])->syncRoles([RoleEnum::ADMIN->value]);
        Permission::create(['name'=>'authors.delete'])->syncRoles([RoleEnum::ADMIN->value]);

        Permission::create(['name'=>'librarians.store'])->syncRoles([RoleEnum::ADMIN->value]);
        Permission::create(['name'=>'librarians.index'])->syncRoles([RoleEnum::ADMIN->value]);
        Permission::create(['name'=>'librarians.update'])->syncRoles([RoleEnum::ADMIN->value]);
        Permission::create(['name'=>'librarians.delete'])->syncRoles([RoleEnum::ADMIN->value]);

        Permission::create(['name'=>'genders.store'])->syncRoles([RoleEnum::ADMIN->value]);
        Permission::create(['name'=>'genders.index'])->syncRoles([RoleEnum::ADMIN->value]);
        Permission::create(['name'=>'genders.update'])->syncRoles([RoleEnum::ADMIN->value]);
        Permission::create(['name'=>'genders.delete'])->syncRoles([RoleEnum::ADMIN->value]);

        Permission::create(['name'=>'specimens.store'])->syncRoles([RoleEnum::ADMIN->value]);
        Permission::create(['name'=>'specimens.index'])->syncRoles([RoleEnum::ADMIN->value]);
        Permission::create(['name'=>'specimens.update'])->syncRoles([RoleEnum::ADMIN->value]);
        Permission::create(['name'=>'specimens.delete'])->syncRoles([RoleEnum::ADMIN->value]);

        Permission::create(['name'=>'status.store'])->syncRoles([RoleEnum::ADMIN->value]);
        Permission::create(['name'=>'status.index'])->syncRoles([RoleEnum::ADMIN->value]);
        Permission::create(['name'=>'status.update'])->syncRoles([RoleEnum::ADMIN->value]);
        Permission::create(['name'=>'status.delete'])->syncRoles([RoleEnum::ADMIN->value]);

        


       // permission::create(['name'=>'update.loan'])->syncRoles([RoleEnum::Admin->value, RoleEnum::Librarian->value]);
        Permission::create(['name'=>'loans.store'])->syncRoles([RoleEnum::LIBRARIAN->value]);
        Permission::create(['name'=>'loans.index'])->syncRoles([RoleEnum::LIBRARIAN->value]);
        Permission::create(['name'=>'loans.update'])->syncRoles([RoleEnum::LIBRARIAN->value]);
        Permission::create(['name'=>'loans.delete'])->syncRoles([RoleEnum::LIBRARIAN->value]);


    }
}
