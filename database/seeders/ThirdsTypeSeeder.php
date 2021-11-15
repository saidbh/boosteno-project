<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThirdsTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('thirds_type')->insert(
            [
                [
                    'name' => 'Particulier',
                ],
                [
                    'name' => 'Entreprise',
                ]
            ]
        );
    }
}
