<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

class ImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i <= 20; $i++) {
            $newImage = new Image();
            $newImage->image = $faker->imageUrl();
            $newImage->project_id = rand(1 - 10);
            $newImage->save();
        }
    }
}
