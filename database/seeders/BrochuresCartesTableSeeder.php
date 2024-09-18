<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrochuresCartesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('brochures_cartes')->insert([
            [
                'id' => 1,
                'nom' => 'Brochure ABC Construction',
                'type_de_fichier' => 'pdf',
                'taille' => 2048,  // Taille en Ko
                'fiche_fournisseur_id' => 1,  // Référence à la table fiche_fournisseurs
                'created_at' => '2024-09-18 15:00:00',
            ],
            [
                'id' => 2,
                'nom' => 'Carte des services Rénovation Xyz',
                'type_de_fichier' => 'jpg',
                'taille' => 512,  // Taille en Ko
                'fiche_fournisseur_id' => 2,  // Référence à la table fiche_fournisseurs
                'created_at' => '2024-09-18 15:30:00',
            ],
            [
                'id' => 3,
                'nom' => 'Guide Plomberie 123',
                'type_de_fichier' => 'docx',
                'taille' => 1024,  // Taille en Ko
                'fiche_fournisseur_id' => 3,  // Référence à la table fiche_fournisseurs
                'created_at' => '2024-09-18 16:00:00',
            ],
            [
                'id' => 4,
                'nom' => 'Brochure Électricité Pro',
                'type_de_fichier' => 'pdf',
                'taille' => 3072,  // Taille en Ko
                'fiche_fournisseur_id' => 4,  // Référence à la table fiche_fournisseurs
                'created_at' => '2024-09-18 16:30:00',
            ],
            [
                'id' => 5,
                'nom' => 'Catalogue Excavation Max',
                'type_de_fichier' => 'pdf',
                'taille' => 4096,  // Taille en Ko
                'fiche_fournisseur_id' => 5,  // Référence à la table fiche_fournisseurs
                'created_at' => '2024-09-18 17:00:00',
            ],
        ]);
    }
}
