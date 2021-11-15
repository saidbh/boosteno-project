<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                "email" => "admin@gmail.com",
                "phone" => "50133899",
                "password" => Hash::make("123456"),
                "archived" => 0,
                "blocked" => 0,
                "activated" => 1,
            ]
        );
    }
}
