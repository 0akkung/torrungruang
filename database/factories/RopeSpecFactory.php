<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RopeSpec>
 */
class RopeSpecFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'spec_name' => fake()->unique()->realTextBetween(3, 20),
            'spec_detail' => fake()->sentence()
        ];
    }
}
