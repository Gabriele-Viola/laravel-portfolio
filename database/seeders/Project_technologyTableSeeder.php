<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Project_technologyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = Project::all();
        $technologies = Technology::all();
        foreach ($projects as $project) {
            $randomTechnology = $technologies->random(rand(1, 3))->pluck('id');

            $project->technologies()->attach($randomTechnology);
        }
    }
}
