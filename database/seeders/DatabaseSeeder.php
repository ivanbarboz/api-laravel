<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
        UserSeeder::class,
        GenderSeeder::class,
        AuthorSeeder::class,
        RoleSeeder::class,
        PermissionSeeder::class,
        StatuSeeder::class,
        BookSeeder::class,
        SpecimenSeeder::class,
        LibrarianSeeder::class,
        LoanSeeder::class
        
    ]);
    }
}
