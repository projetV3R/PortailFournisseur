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
                'prenom' => 'Jean',
                'nom' => 'Dupont',
                'fonction' => 'Directeur',
                'adresse_courrriel' => 'jean.dupont@example.com',
                'ligne' => 1,
                'poste' => '101',
                'numero_telephone' => '555-1234',
                'fiche_fournisseur_id' => 1, // clé étrangère vers une fiche fournisseur existante
            ],
            [
                'prenom' => 'Marie',
                'nom' => 'Lefebvre',
                'fonction' => 'Responsable achats',
                'adresse_courrriel' => 'marie.lefebvre@example.com',
                'ligne' => 2,
                'poste' => '102',
                'numero_telephone' => '555-5678',
                'fiche_fournisseur_id' => 2,
            ],
            [
                'prenom' => 'Luc',
                'nom' => 'Martin',
                'fonction' => 'Comptable',
                'adresse_courrriel' => 'luc.martin@example.com',
                'ligne' => 3,
                'poste' => '103',
                'numero_telephone' => '555-9101',
                'fiche_fournisseur_id' => 3,
            ],
            [
                'prenom' => 'Isabelle',
                'nom' => 'Durand',
                'fonction' => 'Assistante de direction',
                'adresse_courrriel' => 'isabelle.durand@example.com',
                'ligne' => 4,
                'poste' => '104',
                'numero_telephone' => '555-1213',
                'fiche_fournisseur_id' => 4,
            ],
            [
                'prenom' => 'Pierre',
                'nom' => 'Moreau',
                'fonction' => 'Chef de projet',
                'adresse_courrriel' => 'pierre.moreau@example.com',
                'ligne' => 5,
                'poste' => '105',
                'numero_telephone' => '555-1415',
                'fiche_fournisseur_id' => 5,
            ],
        ]);
    }
}
