<?php

namespace Database\Seeders;

use App\Models\Films;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FilmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        $json = file_get_contents(database_path('films.json'));
        $data = json_decode($json, true);

        foreach ($data as $film) {
            $url = $faker->image('public/storage/images', 285, 285, 'films', false);
            Films::create([
                'name' => $film['name'],
                'imdb_rate' => $film['imdb_rate'],
                'release_date' => $film['release_date'],
                'image' => $url
            ]);
        }
    }
}
