<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Support\Str;
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
    public function definition()
    {
        $title = fake()->unique()->sentence(3);

        return [
            'title' => $title,
            'slug' => Str::slug($title), // Ensures the slug matches the title
            'author' => fake()->name(),
            'isbn' => fake()->unique()->isbn13(),
            'description' => fake()->paragraph(),
            'price' => fake()->randomFloat(2, 10, 50),
            'stock_quantity' => fake()->numberBetween(0, 100),
            'genre' => fake()->randomElement(['Fiction', 'Mystery', 'Tech', 'History']),
            
            // This picks a random category ID from your categories table
            'category_id' => Category::inRandomOrder()->first()?->id ?? Category::factory(),
            
            // Optional: Uses a placeholder image service for the cover
            'cover_image' => null, 
        ];
    }
}