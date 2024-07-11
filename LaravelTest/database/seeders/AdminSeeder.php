<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    public function run()
    {
        Admin::factory()->create([
            'username' => 'admin',
            'password' => Hash::make('adminpassword'), // Set a default admin username and password
        ]);
    }
}
