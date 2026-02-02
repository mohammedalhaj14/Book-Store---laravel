<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 1. Run the BookstoreSeeder first to create specific categories and books
        $this->call([
            BookstoreSeeder::class,
        ]);

        // 2. Generate 20 additional random books using the factory
        \App\Models\Book::factory(20)->create();

        // 3. (Optional) Create a default Admin User so you can always log in
        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'), // default password
            'role' => 1, // Ensure this matches your admin role logic
        ]);
    }
}