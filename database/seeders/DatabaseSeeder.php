<?php

namespace Database\Seeders;

use App\Models\DistributorProfile;
use App\Models\DonatorProfile;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::truncate();
        DonatorProfile::truncate();
        DistributorProfile::truncate();

        //Creating 1 admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@live.com',
            'regno' => 'A00000',
            'address' => 'Hmale',
            'is_enabled' => 1,
            'type' => 'admin',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);

        //Creating donators
        User::create([
            'name' => 'Donator',
            'email' => 'donator@live.com',
            'regno' => 'A01000',
            'address' => 'Hmale',
            'is_enabled' => 1,
            'type' => 'donator',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);

        DonatorProfile::create([
            'user_id' => 2,
            'donator_name' => 'The donator',
            'registration' => 'A213213',
            'business_address' => 'Male City',
        ]);

        User::create([
            'name' => 'Donator2',
            'email' => 'donator2@live.com',
            'regno' => 'A01010',
            'address' => 'Hmale',
            'is_enabled' => 1,
            'type' => 'donator',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);

        DonatorProfile::create([
            'user_id' => 3,
            'donator_name' => 'The donator 2',
            'registration' => 'A2132123',
            'business_address' => 'Male City',
        ]);

        User::create([
            'name' => 'Donator3',
            'email' => 'donator3@live.com',
            'regno' => 'A01011',
            'address' => 'Hmale',
            'is_enabled' => 0,
            'type' => 'donator',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);

        DonatorProfile::create([
            'user_id' => 4,
            'donator_name' => 'The donator 3',
            'registration' => 'A314122',
            'business_address' => 'Male City',
        ]);

        //Creating distributors
        User::create([
            'name' => 'Distributor',
            'email' => 'distributor@live.com',
            'regno' => 'A01200',
            'address' => 'Hmale',
            'is_enabled' => 1,
            'type' => 'distributor',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);

        DistributorProfile::create([
            'user_id' => 5,
            'license_no'=> 'A123123'
        ]);

        User::create([
            'name' => 'Distributor2',
            'email' => 'distributor2@live.com',
            'regno' => 'A01230',
            'address' => 'Hmale',
            'is_enabled' => 1,
            'type' => 'distributor',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);

        DistributorProfile::create([
            'user_id' => 6,
            'license_no'=> 'A2349871'
        ]);

        User::create([
            'name' => 'Distributor3',
            'email' => 'distributor3@live.com',
            'regno' => 'A01201',
            'address' => 'Hmale',
            'is_enabled' => 0,
            'type' => 'distributor',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);

        DistributorProfile::create([
            'user_id' => 7,
            'license_no'=> 'A131235'
        ]);

        //Create seekeres
        User::factory()->count(65)->create();

    }
}
