<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // DB::table("users")->insert([
        //     "username" => "admin1",
        //     "name" => "admin2",
        //     "phone_number" => "123",
        //     "email" => "admin2@gmail.com",
        //     "password" => Hash::make("123"),
        //     "user_role_id" => 3,
        // ]);
        // DB::table("users")->insert([
        //     "username" => "admin3",
        //     "name" => "admin3",
        //     "phone_number" => "123",
        //     "email" => "admin3@gmail.com",
        //     "password" => Hash::make("123"),
        //     "user_role_id" => 2,
        // ]);
        // DB::table("users")->insert([
        //     "username" => "admin4",
        //     "name" => "admin4",
        //     "phone_number" => "123",
        //     "email" => "admin4@gmail.com",
        //     "password" => Hash::make("123"),
        //     "user_role_id" => 2,
        // ]);
    }
}
