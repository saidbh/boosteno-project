<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(
            [
                [
                    'title' => 'Tableau de bord',
                    'link' => 'dashboard',
                    'icon' => 'ri-dashboard-line',
                ],
                [
                    'title' => 'Academy',
                    'link' => 'academy',
                    'icon' => 'ri-building-4-line',
                ],
                [
                    'title' => 'Visa étude',
                    'link' => 'visa',
                    'icon' => 'ri-visa-line',
                ],
                [
                    'title' => 'Espaces',
                    'link' => 'space',
                    'icon' => 'ri-group-line',
                ],
                [
                    'title' => 'Tiers',
                    'link' => 'thirds',
                    'icon' => 'ri-contacts-book-line',
                ],
                [
                    'title' => 'Contacts',
                    'link' => 'contacts',
                    'icon' => 'ri-contacts-book-2-line',
                ],
                [
                    'title' => 'Ventes',
                    'link' => 'sales',
                    'icon' => 'ri-funds-box-line',
                ],
                [
                    'title' => 'Achats',
                    'link' => 'purchases',
                    'icon' => 'ri-shopping-cart-line',
                ],
                [
                    'title' => 'Contrats',
                    'link' => 'contracts',
                    'icon' => 'ri-ball-pen-line',
                ],
                [
                    'title' => 'Ressources humaines',
                    'link' => 'rh',
                    'icon' => 'ri-user-2-line',
                ],
                [
                    'title' => 'Marketing & Com',
                    'link' => 'mkg',
                    'icon' => 'ri-chat-voice-line',
                ],
                [
                    'title' => 'Collaboration',
                    'link' => 'team',
                    'icon' => 'ri-group-2-line',
                ],
                [
                    'title' => 'Support clients',
                    'link' => 'support',
                    'icon' => 'ri-customer-service-2-line',
                ],
                [
                    'title' => 'Documents',
                    'link' => 'docs',
                    'icon' => 'ri-file-line',
                ],
                [
                    'title' => 'Rapport',
                    'link' => 'reports',
                    'icon' => 'ri-todo-line',
                ],
                [
                    'title' => 'System',
                    'link' => 'system',
                    'icon' => 'ri-settings-line',
                ]
            ]
        );
    }
}
