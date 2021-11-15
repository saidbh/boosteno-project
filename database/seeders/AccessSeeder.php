<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('access')->insert(
            [[
                'categories_id' => 1,
                'roles_id' => 1,
                'able' => 1
            ],
            [
                'categories_id' => 2,
                'roles_id' => 1,
                'able' => 1
            ],
            [
                'categories_id' => 3,
                'roles_id' => 1,
                'able' => 1
            ],
            [
                'categories_id' => 4,
                'roles_id' => 1,
                'able' => 1
            ],
            [
                'categories_id' => 5,
                'roles_id' => 1,
                'able' => 1
            ],
            [
                'categories_id' => 6,
                'roles_id' => 1,
                'able' => 1
            ],
            [
                'categories_id' => 7,
                'roles_id' => 1,
                'able' => 1
            ],
            [
                'categories_id' => 8,
                'roles_id' => 1,
                'able' => 1
            ],
            [
                'categories_id' => 9,
                'roles_id' => 1,
                'able' => 1
            ],
            [
                'categories_id' => 10,
                'roles_id' => 1,
                'able' => 1
            ],
            [
                'categories_id' => 11,
                'roles_id' => 1,
                'able' => 1
            ],
            [
                'categories_id' => 12,
                'roles_id' => 1,
                'able' => 1
            ],
            [
                'categories_id' => 13,
                'roles_id' => 1,
                'able' => 1
            ],
            [
                'categories_id' => 14,
                'roles_id' => 1,
                'able' => 1
            ],
            [
                'categories_id' => 15,
                'roles_id' => 1,
                'able' => 1
            ],
            [
                'categories_id' => 16,
                'roles_id' => 1,
                'able' => 1
            ]]
        );
    }
}
