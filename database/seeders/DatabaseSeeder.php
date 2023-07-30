<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Amir',
            'email' => 'amir@mail.com',
        ]);
        $this->call([
            CategorySeeder::class
        ]);

        // Post::factory(10)->create();
    }
}
