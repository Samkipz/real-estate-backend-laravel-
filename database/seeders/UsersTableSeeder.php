<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's clear the users table first
        User::truncate();

//        $faker = \Faker\Factory::create();

        $password = bcrypt('samkipz123');

        User::create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => $password,
        ]);
    }
}
