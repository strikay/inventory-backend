<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ExampleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'item_category' => fake()->word(),
            'units' => fake()->randomNumber(4, false),
            'last_added' => fake()->dateTime(),
            'last_taken' => fake()->dateTime(),
            'user' => fake()->randomNumber(6, true),
        ];
    }
}
