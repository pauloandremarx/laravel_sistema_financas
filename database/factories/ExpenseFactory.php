<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\invoice>
 */
class ExpenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'value' => $this->faker->numberBetween(100, 10000),
            'description' => $this->faker->sentence,
            'date' => $this->faker->randomElement([$this->faker->dateTimeInInterval('-1 year', '+1 year')]) ,
            'user_id' => User::all()->random()->id,
            'types' => $this->faker->randomElement([ "Educação", "Moradia", "Pagamentos", "Saúde", "Transporte"  ]),

        ];
    }
}
