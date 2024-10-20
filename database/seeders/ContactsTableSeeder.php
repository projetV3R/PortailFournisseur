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
                'adresse_courrriel' => 'jean.dupont@example.com',
                'ligne' => 1,
                'poste' => '101',
                'numero_telephone' => '555-1234',
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
                'adresse_courrriel' => 'marie.lefebvre@example.com',
                'ligne' => 2,
                'poste' => '102',
                'numero_telephone' => '555-5678',
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
                'adresse_courrriel' => 'luc.martin@example.com',
                'ligne' => 3,
                'poste' => '103',
                'numero_telephone' => '555-9101',
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
                'adresse_courrriel' => 'isabelle.durand@example.com',
                'ligne' => 4,
                'poste' => '104',
                'numero_telephone' => '555-1213',
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
                'adresse_courrriel' => 'pierre.moreau@example.com',
                'ligne' => 5,
                'poste' => '105',
                'numero_telephone' => '555-1415',
                'fiche_fournisseur_id' => 5,
                'telephone_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
