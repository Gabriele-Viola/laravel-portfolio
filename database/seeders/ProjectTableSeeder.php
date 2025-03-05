<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 10; $i++) {
            $newProject = new Project();
            $newProject->title = $faker->sentence();
            $newProject->client = $faker->company();
            $newProject->period = $faker->dateTimeBetween('-2 month', '+ 1 month');
            $newProject->description = $faker->paragraph(6);
            $newProject->technologies = $faker->words(rand(2, 6));

            $newProject->save();
        }
    }
}
