<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaxesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('taxes')->insert(
            [
                [
                    'name' => 'Collectibe 7%',
                    'value' => 0.07
                ],
                [
                    'name' => 'Collectibe 10%',
                    'value' => 0.1
                ],
                [
                    'name' => 'Collectibe 13%',
                    'value' => 0.13
                ],
                [
                    'name' => 'Collectibe 19%',
                    'value' => 0.19
                ]
            ]
        );
    }
}
