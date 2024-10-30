<?php

namespace Database\Seeders;

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
                'fonction' => 'Directeur',
                'adresse_courriel' => 'jean.dupont@example.com',
                'fiche_fournisseur_id' => 1, // Référence à une fiche fournisseur existante
                'telephone_id' => 1,  // Référence à une ligne de téléphone existante
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'prenom' => 'Marie',
                'nom' => 'Lefebvre',
                'fonction' => 'Responsable achats',
                'adresse_courriel' => 'marie.lefebvre@example.com',
                'fiche_fournisseur_id' => 2,
                'telephone_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'prenom' => 'Luc',
                'nom' => 'Martin',
                'fonction' => 'Comptable',
                'adresse_courriel' => 'luc.martin@example.com',
                'fiche_fournisseur_id' => 3,
                'telephone_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'prenom' => 'Isabelle',
                'nom' => 'Durand',
                'fonction' => 'Assistante de direction',
                'adresse_courriel' => 'isabelle.durand@example.com',
                'fiche_fournisseur_id' => 4,
                'telephone_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'prenom' => 'Pierre',
                'nom' => 'Moreau',
                'fonction' => 'Chef de projet',
                'adresse_courriel' => 'pierre.moreau@example.com',
                'fiche_fournisseur_id' => 5,
                'telephone_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
