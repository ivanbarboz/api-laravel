<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Librarian>
 */
class LibrarianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name' => fake()->name(),
            'last_name' => fake()->lastName(),
            'email' => fake()->email(),
            'cell_phone' => $this->faker->unique()->phoneNumber(),
            'address'=>fake()->address(),
        ];
    }
}
