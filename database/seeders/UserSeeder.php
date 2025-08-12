<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Contact;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
        'name' => 'Test User',
        'email' => 'test1@example.com',
       'password' => Hash::make('password1234'),
        ]);
        Contact::create([
            'user_id'=>1,
            'phone_no'=>'8768468787',
            'address'=>'test_address'
        ]);
    }
}
