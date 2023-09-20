<?php

namespace Database\Factories;

use App\Models\Branch;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->unique()->word();
        return [
            "name" => $name,
            "slug" => Str::slug($name, '-'),
            "price" => fake()->randomFloat(2, 0, 1000),
            "description" => fake()->paragraph(),
            "images" => [
                fake()->imageUrl(),
                fake()->imageUrl(),
                fake()->imageUrl(),
                fake()->imageUrl(),
                fake()->imageUrl(),
            ],
            "branch_id" => Branch::inRandomOrder()->first()->id
        ];
    }
}
