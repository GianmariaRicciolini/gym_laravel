<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'name' => 'Lorem Ipsum',
            'email' => 'lorem@ipsum.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Prova Prova',
            'email' => 'prova@prova.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'example',
            'email' => 'example@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}
