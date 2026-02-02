<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Str;

class BookstoreSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create Categories
        $fiction = Category::firstOrCreate(
            ['slug' => 'fiction'], 
            ['name' => 'Fiction']
        );

        $science = Category::firstOrCreate(
            ['slug' => 'science'], 
            ['name' => 'Science']
        );

        // 2. Add Specific "Featured" Books
        // Note: Added 'slug' and 'genre' to match your database requirements
        Book::firstOrCreate(
            ['isbn' => '9780743273565'],
            [
                'title' => 'The Great Gatsby',
                'slug' => Str::slug('The Great Gatsby'),
                'author' => 'F. Scott Fitzgerald',
                'description' => 'A classic novel about the American dream.',
                'price' => 15.99,
                'stock_quantity' => 10,
                'category_id' => $fiction->id,
                'genre' => 'Classic',
                'cover_image' => 'book_covers/gatsby_placeholder.jpg' 
            ]
        );

        Book::firstOrCreate(
            ['isbn' => '9780553380163'],
            [
                'title' => 'A Brief History of Time',
                'slug' => Str::slug('A Brief History of Time'),
                'author' => 'Stephen Hawking',
                'description' => 'A landmark volume in scientific writing.',
                'price' => 24.50,
                'stock_quantity' => 5,
                'category_id' => $science->id,
                'genre' => 'Science',
                'cover_image' => 'book_covers/hawking_placeholder.jpg'
            ]
        );

        // 3. Generate 50 Random Fake Books using the Factory
        // This will populate your store and pagination quickly!
        Book::factory(50)->create();
    }
}