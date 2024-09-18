<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LicencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('licences')->insert([
            [
                'id' => 1,
                'numero_licence_rbq' => 'RBQ12345678',
                'statut' => 'Valide',
                'type_licence' => 'Construction générale',
                'categorie' => 'Génie civil',
                'code_sous_categorie' => '1111',
                'travaux_permis' => 'Travaux de construction routière',
                'created_at' => '2024-09-18 10:00:00',
            ],
            [
                'id' => 2,
                'numero_licence_rbq' => 'RBQ23456789',
                'statut' => 'Suspendue',
                'type_licence' => 'Construction résidentielle',
                'categorie' => 'Bâtiments résidentiels',
                'code_sous_categorie' => '2222',
                'travaux_permis' => 'Rénovation résidentielle',
                'created_at' => '2024-09-18 11:00:00',
            ],
            [
                'id' => 3,
                'numero_licence_rbq' => 'RBQ34567890',
                'statut' => 'Expirée',
                'type_licence' => 'Travaux spécialisés',
                'categorie' => 'Électricité',
                'code_sous_categorie' => '3333',
                'travaux_permis' => 'Installation de systèmes électriques',
                'created_at' => '2024-09-18 12:00:00',
            ],
            [
                'id' => 4,
                'numero_licence_rbq' => 'RBQ45678901',
                'statut' => 'Valide',
                'type_licence' => 'Plomberie et chauffage',
                'categorie' => 'Chauffage',
                'code_sous_categorie' => '4444',
                'travaux_permis' => 'Installation de systèmes de chauffage',
                'created_at' => '2024-09-18 13:00:00',
            ],
            [
                'id' => 5,
                'numero_licence_rbq' => 'RBQ56789012',
                'statut' => 'Révoquée',
                'type_licence' => 'Génie civil',
                'categorie' => 'Excavation',
                'code_sous_categorie' => '5555',
                'travaux_permis' => 'Travaux d\'excavation',
                'created_at' => '2024-09-18 14:00:00',
            ],
        ]);
        
    }
}
