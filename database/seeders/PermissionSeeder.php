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
        Permission::create(['name'=>'update.book'])->syncRoles([RoleEnum::ADMIN->value]);
        Permission::create(['name'=>'index.book'])->syncRoles([RoleEnum::ADMIN->value, RoleEnum::LIBRARIAN->value]);
        Permission::create(['name'=>'delete.book'])->syncRoles([RoleEnum::ADMIN->value]);
        Permission::create(['name'=>'create.book'])->syncRoles([RoleEnum::ADMIN->value]);
        
    


       // permission::create(['name'=>'update.loan'])->syncRoles([RoleEnum::Admin->value, RoleEnum::Librarian->value]);
        Permission::create(['name'=>'crate.loan'])->syncRoles([RoleEnum::LIBRARIAN->value]);
        Permission::create(['name'=>'update.loan'])->syncRoles([RoleEnum::LIBRARIAN->value]);
        Permission::create(['name'=>'index.loan'])->syncRoles([RoleEnum::LIBRARIAN->value]);
        Permission::create(['name'=>'delete.loan'])->syncRoles([RoleEnum::LIBRARIAN->value]);


    }
}
