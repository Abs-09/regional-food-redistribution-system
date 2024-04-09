<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //admin user
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@live.com',
            'regno' => 'A000000',
            'address' => 'root',
            'type' => 'admin',
            'is_enabled' => 1
        ]);
    }
}
