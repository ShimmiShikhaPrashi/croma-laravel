<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test1 User',
        //     'email' => 'test1@example.com',
        // ]);

         $this->call([
            AuthorSeeder::class,
            BookSeeder::class,
            ReviewSeeder::class,
        ]);
        $this->call([
            UserSeeder::class,           
        ]);
         Post::factory(100)->create();
         Category::factory(10)->create();
    }
}
