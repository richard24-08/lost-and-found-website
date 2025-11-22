<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id' => 1,
                'name' => 'Arshavin',
                'email' => 'arshavin@gmail.com',
                'phone_number' => '081319123113',
                'password' => Hash::make('arshavin'),
                'status' => 'Murid',
                'department' => 'SMK Kristen Immanuel',
                'birth_date' => '2005-05-15',
                'image_path' => null,
                'email_verified_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'name' => 'Evlina',
                'email' => 'evlina@gmail.com',
                'phone_number' => '0802490492409',
                'password' => Hash::make('evlina'),
                'status' => 'Murid',
                'department' => 'SMK Kristen Immanuel',
                'birth_date' => '2006-03-20',
                'image_path' => null,
                'email_verified_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'name' => 'Farrel Fortunio',
                'email' => 'farrel@gmail.com',
                'phone_number' => '08408401930139',
                'password' => Hash::make('farrel'),
                'status' => 'Murid',
                'department' => 'SMK Kristen Immanuel',
                'birth_date' => '2005-11-10',
                'image_path' => null,
                'email_verified_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 4,
                'name' => 'Richard Sebastian',
                'email' => 'richard@gmail.com',
                'phone_number' => '08130131203911',
                'password' => Hash::make('richard'),
                'status' => 'Murid',
                'department' => 'SMK Kristen Immanuel',
                'birth_date' => '2005-08-25',
                'image_path' => null,
                'email_verified_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 5,
                'name' => 'Guru Matematika',
                'email' => 'guru@gmail.com',
                'phone_number' => '081234567890',
                'password' => Hash::make('guru'),
                'status' => 'Guru',
                'department' => 'SMK Kristen Immanuel',
                'birth_date' => '1980-01-01',
                'image_path' => null,
                'email_verified_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('users')->upsert(
            $users,
            ['id'], // unique key
            [
                'name', 
                'email', 
                'phone_number', 
                'password', 
                'status', 
                'department', 
                'birth_date', 
                'image_path',
                'email_verified_at',
                'updated_at'
            ] // fields to update
        );
    }
}