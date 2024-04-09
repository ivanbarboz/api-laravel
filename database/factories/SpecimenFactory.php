<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Specimen>
 */
class SpecimenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'statu_id'=>fake()->numberBetween(1,10),
            'book_id'=>fake()->numberBetween(1,10),
        ];
    }
}
