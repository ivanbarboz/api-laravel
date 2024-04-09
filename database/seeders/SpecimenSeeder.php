<?php

namespace Database\Seeders;

use App\Models\Specimen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecimenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Specimen::factory(10)->create();
    }
}
