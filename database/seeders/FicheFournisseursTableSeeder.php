<?php

namespace Database\Seeders;

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
                'neq' => '1145678901',  // Respect des règles: 11 suivi de 4-9 puis 7 chiffres
                'etat' => 'En attente',
                'nom_entreprise' => 'Construction ABC Inc.',
                'adresse_courriel' => 'contact@abcconstruction.com',
                'password' => bcrypt('Abc123!@'),  // Respect des règles du mot de passe
                'details_specifications' => 'Construction de bâtiments commerciaux et résidentiels',
                'date_changement_etat' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'neq' => '2245678902',
                'etat' => 'En attente',
                'nom_entreprise' => 'Rénovation Xyz Ltée',
                'adresse_courriel' => 'info@renovxyz.ca',
                'password' => bcrypt('Xyz456@!'),  // Respect des règles du mot de passe
                'details_specifications' => 'Rénovation et agrandissement résidentiel',
                'date_changement_etat' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'neq' => '3345678903',
                'etat' => 'En attente',
                'nom_entreprise' => 'Plomberie 123',
                'adresse_courriel' => 'support@plomberie123.com',
                'password' => bcrypt('Plomb789$#'),  // Respect des règles du mot de passe
                'details_specifications' => 'Services de plomberie résidentielle et commerciale',
                'date_changement_etat' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'neq' => '8845678904',
                'etat' => 'En attente',
                'nom_entreprise' => 'Électricité Pro',
                'adresse_courriel' => 'contact@electropro.com',
                'password' => bcrypt('ElecPro321@#'),  // Respect des règles du mot de passe
                'details_specifications' => 'Installation de systèmes électriques pour bâtiments industriels',
                'date_changement_etat' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'neq' => '1145678905',
                'etat' => 'En attente',
                'nom_entreprise' => 'Excavation Max',
                'adresse_courriel' => 'info@excavationmax.ca',
                'password' => bcrypt('ExcaMax123$%'),  // Respect des règles du mot de passe
                'details_specifications' => 'Excavation et terrassement',
                'date_changement_etat' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
