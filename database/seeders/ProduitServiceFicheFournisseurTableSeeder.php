<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProduitServiceFicheFournisseurTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('produit_service_fiche_fournisseur')->insert([
            [
                'id' => 1,
                'produit_service_id' => 1,  // Référence à la table produits_services
                'fiche_fournisseur_id' => 1,  // Référence à la table fiche_fournisseurs
                'created_at' => '2024-09-18 10:00:00',
            ],
            [
                'id' => 2,
                'produit_service_id' => 2,  // Référence à la table produits_services
                'fiche_fournisseur_id' => 2,  // Référence à la table fiche_fournisseurs
                'created_at' => '2024-09-18 10:30:00',
            ],
            [
                'id' => 3,
                'produit_service_id' => 3,  // Référence à la table produits_services
                'fiche_fournisseur_id' => 3,  // Référence à la table fiche_fournisseurs
                'created_at' => '2024-09-18 11:00:00',
            ],
            [
                'id' => 4,
                'produit_service_id' => 4,  // Référence à la table produits_services
                'fiche_fournisseur_id' => 4,  // Référence à la table fiche_fournisseurs
                'created_at' => '2024-09-18 11:30:00',
            ],
            [
                'id' => 5,
                'produit_service_id' => 5,  // Référence à la table produits_services
                'fiche_fournisseur_id' => 5,  // Référence à la table fiche_fournisseurs
                'created_at' => '2024-09-18 12:00:00',
            ],
        ]);
    }
}
