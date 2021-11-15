<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories_type')->insert(
            [
                [
                    'name' => 'Prospect',
                ],
                [
                    'name' => 'Client',
                ],
                [
                    'name' => 'Fournisseur',
                ],
            ]
        );
    }
}
