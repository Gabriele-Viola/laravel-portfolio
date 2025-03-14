<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $technologies = [
            "HTML",
            "CSS",
            "JavaScript",
            "node",
            "express",
            "react",
            "PHP",
            "laravel",
            "bootstrap",
            "tailwindcss",
        ];

        foreach ($technologies as $technology) {
            $newTecnology = new Technology();
            $newTecnology->name = $technology;
            $newTecnology->description = $faker->sentence();
            $newTecnology->image = 'img/' . $technology . '.webp';

            $newTecnology->save();
        }
    }
}
