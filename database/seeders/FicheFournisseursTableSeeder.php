<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FicheFournisseursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('fiche_fournisseurs')->insert([
            [
                'id' => 1,
                'neq' => '1145678901',
                'nom_entreprise' => 'Construction ABC Inc.',
                'adresse_courriel' => 'contact@abcconstruction.com',
                'mot_de_passe' => bcrypt('password123'),
                'licence_id' => 1,  // Référence à la table licences
                'coordonnee_id' => 1,  // Référence à la table coordonnees
                'finance_id' => 1,  // Référence à la table finances
                'created_at' => '2024-09-18 10:00:00',
            ],
            [
                'id' => 2,
                'neq' => '2145678902',
                'nom_entreprise' => 'Rénovation Xyz Ltée',
                'adresse_courriel' => 'info@renovxyz.ca',
                'mot_de_passe' => bcrypt('securePass456'),
                'licence_id' => 2,  // Référence à la table licences
                'coordonnee_id' => 2,  // Référence à la table coordonnees
                'finance_id' => 2,  // Référence à la table finances
                'created_at' => '2024-09-18 11:00:00',
            ],
            [
                'id' => 3,
                'neq' => '3145678903',
                'nom_entreprise' => 'Plomberie 123',
                'adresse_courriel' => 'support@plomberie123.com',
                'mot_de_passe' => bcrypt('plomb789'),
                'licence_id' => 3,  // Référence à la table licences
                'coordonnee_id' => 3,  // Référence à la table coordonnees
                'finance_id' => 3,  // Référence à la table finances
                'created_at' => '2024-09-18 12:00:00',
            ],
            [
                'id' => 4,
                'neq' => '4145678904',
                'nom_entreprise' => 'Électricité Pro',
                'adresse_courriel' => 'contact@electropro.com',
                'mot_de_passe' => bcrypt('elecpro321'),
                'licence_id' => 4,  // Référence à la table licences
                'coordonnee_id' => 4,  // Référence à la table coordonnees
                'finance_id' => 4,  // Référence à la table finances
                'created_at' => '2024-09-18 13:00:00',
            ],
            [
                'id' => 5,
                'neq' => '5145678905',
                'nom_entreprise' => 'Excavation Max',
                'adresse_courriel' => 'info@excavationmax.ca',
                'mot_de_passe' => bcrypt('excaMax123'),
                'licence_id' => 5,  // Référence à la table licences
                'coordonnee_id' => 5,  // Référence à la table coordonnees
                'finance_id' => 5,  // Référence à la table finances
                'created_at' => '2024-09-18 14:00:00',
            ],
        ]);
    }
}
