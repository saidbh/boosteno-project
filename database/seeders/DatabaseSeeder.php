<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategoriesSeeder::class,
            SubCategoriesSeeder::class,
            
            ThirdsTypeSeeder::class,
            CategoriesTypeSeeder::class,
            StatusTypeSeeder::class,
            EmployeesTypeSeeder::class,
            TeachersTypeSeeder::class,
            LessonsTypeSeeder::class,

            TaxesSeeder::class,
            ConditionsSeeder::class,
            UnitsSeeder::class,

            UserSeeder::class,
            RolesSeeder::class,
            
            

            AccessSeeder::class,
            PermissionsSeeder::class,
            UsersRolesSeeder::class,
        ]);
    }
}
