<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table("user_roles")->insert([
            "name" => "Nhân viên",
        ]);
        DB::table("user_roles")->insert([
            "name" => "Quản lý",
        ]);
        DB::table("user_roles")->insert([
            "name" => "Khách hàng",
        ]);
       
    }
}
