<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        $tags = [];
        for ($i=0; $i < 3; $i++) { 
            array_push($tags, fake()->word());
        }
        return [
            'name'=> fake()->name(),
            'tags'=> $tags,
            'description' => fake()->text(),
            'price' => fake()->numberBetween(100, 10000),
            'stock' => fake()->numberBetween(0,999),
            'category_id' => Category::class
        ];
    }
}
