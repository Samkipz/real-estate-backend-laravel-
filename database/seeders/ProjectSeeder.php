<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's clear the table first
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Project::truncate();
        Project::factory()->count(100)->create();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


//        $faker = \Faker\Factory::create();


    }
}
