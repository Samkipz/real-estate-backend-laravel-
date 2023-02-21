<?php

namespace Database\Seeders;

use App\Models\Issue;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IssueSeeder extends Seeder
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
        Issue::truncate();
        Issue::factory()->count(50)->create();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
