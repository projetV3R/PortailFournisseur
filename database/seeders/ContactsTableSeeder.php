<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contacts')->insert([
            [
                'id' => 1,
                'prenom' => 'Jean',
                'nom' => 'Dupont',
                'fonction' => 'Directeur des ventes',
                'adresse_courrriel' => 'jean.dupont@entreprise1.com',
                'fiche_fournisseur_id' => 1,  // Référence à la table fiche_fournisseurs
                'created_at' => '2024-09-18 10:00:00',
            ],
            [
                'id' => 2,
                'prenom' => 'Marie',
                'nom' => 'Durand',
                'fonction' => 'Responsable des achats',
                'adresse_courrriel' => 'marie.durand@entreprise2.com',
                'fiche_fournisseur_id' => 2,  // Référence à la table fiche_fournisseurs
                'created_at' => '2024-09-18 10:30:00',
            ],
            [
                'id' => 3,
                'prenom' => 'Pierre',
                'nom' => 'Martin',
                'fonction' => 'Chef de projet',
                'adresse_courrriel' => 'pierre.martin@entreprise3.com',
                'fiche_fournisseur_id' => 3,  // Référence à la table fiche_fournisseurs
                'created_at' => '2024-09-18 11:00:00',
            ],
            [
                'id' => 4,
                'prenom' => 'Sophie',
                'nom' => 'Leroy',
                'fonction' => 'Chargée de communication',
                'adresse_courrriel' => 'sophie.leroy@entreprise4.com',
                'fiche_fournisseur_id' => 4,  // Référence à la table fiche_fournisseurs
                'created_at' => '2024-09-18 11:30:00',
            ],
            [
                'id' => 5,
                'prenom' => 'Luc',
                'nom' => 'Bernard',
                'fonction' => 'Ingénieur commercial',
                'adresse_courrriel' => 'luc.bernard@entreprise5.com',
                'fiche_fournisseur_id' => 5,  // Référence à la table fiche_fournisseurs
                'created_at' => '2024-09-18 12:00:00',
            ],
        ]);
        
    }
}
