<?php
// database/seeders/AlbumSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AlbumSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Read CSV file
        $csvFile = fopen(base_path("database/data/albums.csv"), "r");
        $firstline = true;

        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                DB::table('albums')->insert([
                    'name' => $data[0],
                    'album' => $data[1],
                    'sales' => $data[2],
                    'image' => $faker->optional()->imageUrl,
                    'created_at' => $data[3],
                    'updated_at' => $data[4],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
