<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectUnit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectUnitSeeder extends Seeder
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
        ProjectUnit::truncate();
        ProjectUnit::factory()->count(10)->create();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


    }
}
