<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\invoice>
 */
class IncomeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::all()->random()->id,
            'description' => $this->faker->sentence,
            'value' => $this->faker->numberBetween(100, 10000),
            'date' => $this->faker->randomElement([$this->faker->dateTimeThisMonth()]) ,
        ];
    }
}
