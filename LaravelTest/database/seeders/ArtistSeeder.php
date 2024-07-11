<?php
// database/seeders/ArtistSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ArtistSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Read CSV file
        $csvFile = fopen(base_path("database/data/artists.csv"), "r");
        $firstline = true;

        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                DB::table('artists')->insert([
                    'zip_code' => $faker->postcode,
                    'name' => $data[0],
                    'username' => $faker->unique()->userName,
                    'email' => $faker->unique()->safeEmail,
                    'email_verified_at' => $faker->optional()->dateTime,
                    'password' => Hash::make('password'), 
                    'remember_token' => Str::random(10),
                    'created_at' => $data[1],
                    'updated_at' => $data[2],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
    // public function run()
    // {
    //     \App\Models\Artist::factory()->count(50)->create();
    // }
}
