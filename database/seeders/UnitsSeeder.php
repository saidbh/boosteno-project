<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('units')->insert(
            [
                [
                    'name' => 'piéce',
                ],
                [
                    'name' => 'unité',
                ]
            ]
        );
    }
}
