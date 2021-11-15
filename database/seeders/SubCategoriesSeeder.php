<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_categories')->insert(
            [
                [
                    'title' => 'Gestion des clients',
                    'categories_id' => 2,
                    'link' => 'academy-clients'
                ],
                [
                    'title' => 'Gestion des enseignants',
                    'categories_id' => 2,
                    'link' => 'academy-teachers'
                ],
                [
                    'title' => 'Gestion des salles',
                    'categories_id' => 2,
                    'link' => 'academy-rooms'
                ],
                [
                    'title' => 'Gestion des classes',
                    'categories_id' => 2,
                    'link' => 'academy-classes'
                ],
                [
                    'title' => 'Gestion des cours',
                    'categories_id' => 2,
                    'link' => 'academy-lessons'
                ],
                [
                    'title' => 'Gestion des sessions',
                    'categories_id' => 2,
                    'link' => 'academy-sessions'
                ],
                [
                    'title' => 'Gestion de scolarité',
                    'categories_id' => 2,
                    'link' => 'academy-schooling'
                ],
                [
                    'title' => 'Nouveau tier',
                    'categories_id' => 5,
                    'link' => 'thirds-new'
                ],
                [
                    'title' => 'liste de tiers',
                    'categories_id' => 5,
                    'link' => 'thirds-list'
                ],
                [
                    'title' => 'Prospects',
                    'categories_id' => 5,
                    'link' => 'thirds-prospects'
                ],
                [
                    'title' => 'Clients',
                    'categories_id' => 5,
                    'link' => 'thirds-clients'
                ],
                [
                    'title' => 'Fournisseurs',
                    'categories_id' => 5,
                    'link' => 'thirds-suppliers'
                ],
                [
                    'title' => 'Nouveau contact',
                    'categories_id' => 6,
                    'link' => 'contacts-new'
                ],
                [
                    'title' => 'liste de contacts',
                    'categories_id' => 6,
                    'link' => 'contacts-list'
                ],
                [
                    'title' => 'Prospects',
                    'categories_id' => 6,
                    'link' => 'contacts-prospects'
                ],
                [
                    'title' => 'Clients',
                    'categories_id' => 6,
                    'link' => 'contacts-clients'
                ],
                [
                    'title' => 'Fournisseurs',
                    'categories_id' => 6,
                    'link' => 'contacts-suppliers'
                ],
                [
                    'title' => 'Clients',
                    'categories_id' => 7,
                    'link' => 'sales-clients'
                ],
                [
                    'title' => 'Devis',
                    'categories_id' => 7,
                    'link' => 'sales-estimates'
                ],
                [
                    'title' => 'Commandes',
                    'categories_id' => 7,
                    'link' => 'sales-orders'
                ],
                [
                    'title' => 'Factures',
                    'categories_id' => 7,
                    'link' => 'sales-invoices'
                ],
                [
                    'title' => 'Services',
                    'categories_id' => 7,
                    'link' => 'sales-services'
                ],
                [
                    'title' => 'Gestion des employés',
                    'categories_id' => 10,
                    'link' => 'rh-employees'
                ],
                [
                    'title' => 'Recrutement',
                    'categories_id' => 10,
                    'link' => 'rh-recruitments'
                ],
                [
                    'title' => 'Evaluations',
                    'categories_id' => 10,
                    'link' => 'rh-evaluations'
                ],
                [
                    'title' => 'Demande de congés',
                    'categories_id' => 10,
                    'link' => 'rh-requests'
                ],
                [
                    'title' => 'Note de frais',
                    'categories_id' => 10,
                    'link' => 'rh-expenses'
                ],
                [
                    'title' => 'Rapport',
                    'categories_id' => 10,
                    'link' => 'rh-reports'
                ],
                [
                    'title' => 'Sociétés et plus',
                    'categories_id' => 16,
                    'link' => 'system-companies-plus'
                ],
                [
                    'title' => 'Agences',
                    'categories_id' => 16,
                    'link' => 'system-agencies'
                ],
                [
                    'title' => 'Départements',
                    'categories_id' => 16,
                    'link' => 'system-departments'
                ],
                [
                    'title' => 'Rôles et permissions',
                    'categories_id' => 16,
                    'link' => 'system-role-permission'
                ],
                [
                    'title' => 'Attribution Rôle',
                    'categories_id' => 16,
                    'link' => 'system-assign-role'
                ],
                [
                    'title' => 'Mailing et validation',
                    'categories_id' => 16,
                    'link' => 'system-mailing-validation'
                ],
                [
                    'title' => 'Devise',
                    'categories_id' => 16,
                    'link' => 'system-currencies'
                ],
                [
                    'title' => 'Agences',
                    'categories_id' => 16,
                    'link' => 'system-agencies'
                ],
                [
                    'title' => 'Departements',
                    'categories_id' => 16,
                    'link' => 'system-departmens'
                ],
                [
                    'title' => 'Dictionnaire',
                    'categories_id' => 16,
                    'link' => 'system-dictionary'
                ],
            ]
        );
    }
}
