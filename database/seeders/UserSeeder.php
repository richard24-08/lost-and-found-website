<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            ],
            [
                'id' => 2,
                'name' => 'Evlina',
                'email' => 'evlina@gmail.com',
                'phone_number' => '0802490492409',
                'password' => Hash::make('evlina'),
            ],
            [
                'id' => 3,
                'name' => 'Farrel Fortunio',
                'email' => 'farrel@gmail.com',
                'phone_number' => '08408401930139',
                'password' => Hash::make('farrel'),
            ],
            [
                'id' => 4,
                'name' => 'Richard Sebastian',
                'email' => 'richard@gmail.com',
                'phone_number' => '08130131203911',
                'password' => Hash::make('richard'),
            ],
        ];

        DB::table('users')->upsert(
            $users,
            ['id'], // unique key
            ['name', 'email', 'password'] // fields to update
        );
    }
}
