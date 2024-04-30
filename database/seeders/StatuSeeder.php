<?php

namespace Database\Seeders;

use App\Enums\StatuEnum;
use App\Models\Statu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach(StatuEnum::cases() as $role)
        {
            Statu::create(['name'=> $role]);
        }
    }
}
