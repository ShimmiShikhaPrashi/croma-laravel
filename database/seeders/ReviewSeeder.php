<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\User;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $user = User::firstOrCreate([
        //     'email' => 'test@example.com'
        // ], [
        //     'name' => 'Test User',
        //     'password' => bcrypt('password')
        // ]);

        // Review::create([
        //     'book_id' => 1,
        //     'user_id' => $user->id,
        //     'content' => 'Amazing book! A magical journey.',
        //     'rating' => 5
        // ]);

        // Review::create([
        //     'book_id' => 2,
        //     'user_id' => $user->id,
        //     'content' => 'Epic fantasy and political drama!',
        //     'rating' => 4
        // ]);
    }
}
