<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConditionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('conditions')->insert(
            [
                [
                    'name' => 'Paiement',
                    'description' => 'Le paiement des cours est exigible lors de l`\'inscription et avant le début de la session.'
                ],
                [
                    'name' => 'Cours',
                    'description' => 'Tous cours entamé ne sear pas remboursé'
                ],
                [
                    'name' => 'Remboursement',
                    'description' => 'Le remboursement des frais d\'inscription ne sera que de 50% pour les annulations d\'inscription intervenue moins d\'une semaine avant le début de la session'
                ],
                [
                    'name' => 'Remise',
                    'description' => 'L\'octroi de la remise est subordonné à la présentation d\'une photocopie de la carte d\'étudiant (Université Centrale Ou SUPSAT) en cours de validité'
                ]
            ]
        );
    }
}
