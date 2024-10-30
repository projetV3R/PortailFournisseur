<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProduitsServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('produits_services')->insert([
            [
                'id' => 1,
                'nature' => 'Produit',
                'code_categorie' => 'TV123',
                'code_unspsc' => '52161547',
                'description' => 'Télévision 4K 55 pouces',
                'details_specifications' => 'Écran LED, résolution UHD, compatibilité HDR',
                'created_at' => '2024-09-18 10:00:00',
                'updated_at' => '2024-09-18 10:00:00',
            ],
            [
                'id' => 2,
                'nature' => 'Service',
                'code_categorie' => 'SVC001',
                'code_unspsc' => '76111501',
                'description' => 'Nettoyage de bureaux',
                'details_specifications' => 'Nettoyage quotidien, produits écologiques',
                'created_at' => '2024-09-18 11:00:00',
                'updated_at' => '2024-09-18 11:00:00',
            ],
            [
                'id' => 3,
                'nature' => 'Produit',
                'code_categorie' => 'MBL045',
                'code_unspsc' => '56101504',
                'description' => 'Chaise ergonomique avec accoudoirs',
                'details_specifications' => 'Réglage hauteur, soutien lombaire, assise rembourrée',
                'created_at' => '2024-09-18 12:00:00',
                'updated_at' => '2024-09-18 12:00:00',
            ],
            [
                'id' => 4,
                'nature' => 'Produit',
                'code_categorie' => 'PC678',
                'code_unspsc' => '43211503',
                'description' => 'Ordinateur portable 13 pouces',
                'details_specifications' => 'Processeur Intel i7, 16 Go RAM, SSD 512 Go',
                'created_at' => '2024-09-18 13:00:00',
                'updated_at' => '2024-09-18 13:00:00',
            ],
            [
                'id' => 5,
                'nature' => 'Service',
                'code_categorie' => 'TRN009',
                'code_unspsc' => '86101601',
                'description' => 'Formation en développement web',
                'details_specifications' => 'Cours interactifs, accès illimité, tutoriels vidéo',
                'created_at' => '2024-09-18 14:00:00',
                'updated_at' => '2024-09-18 14:00:00',
            ],
        ]);
    }
}
