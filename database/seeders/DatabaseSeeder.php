<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'test user',
            'username' => 'testuser',
            'email' => 'test@test.com',
        ]);

        $categories = [
            'Technology',
            'Lifestyle',
            'Health',
            'Sports',
            'Entertainment',
            'Laravel',
        ];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}
