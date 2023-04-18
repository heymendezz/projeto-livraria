<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'author' => fake()->name(),
            'image_url' => fake()->imageUrl(),
            'release_date' => fake()->dateTimeThisCentury(),
            'price' => fake()->randomFloat(4, 0.0, 100.0)
        ];
    }
}
