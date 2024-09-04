<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->word(),
            'description' => fake()->sentence(),
            'price' => fake()->numberBetween(100, 1000),
            'address' => fake()->streetAddress(),
            'image_path' => ['1723779937.jpg', '1723780062.jpg'][rand(0, 1)],
            'image1_path' => ['JiHrecqJZd4IR73.jpg', 'ywEmP8u9UfGvX8D.jpg'][rand(0, 1)],
            'owner_id' => [1, 2][rand(0, 1)],
            'furnished' => false,
            'total_floors' => rand(6, 7),
            'surface' => fake()->numberBetween(10, 500),
            'categorie_id' => [1, 2][rand(0, 1)],
            'is_public' => [true, false][rand(0,1)],
            'user_id' => [1, 2][rand(0, 1)],
        ];
    }
}
