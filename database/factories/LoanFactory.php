<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Loan>
 */
class LoanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'loan_date'=>fake()->dateTimeBetween('-1 year', 'now'),
            'return_date'=>fake()->dateTimeBetween('-1 year', 'now'),
            'specimen_id'=>fake()->numberBetween(1,10),
            'user_id'=>fake()->numberBetween(1,10),
        ];
    }
}
