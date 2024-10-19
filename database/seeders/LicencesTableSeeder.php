<?php

namespace Database\Seeders;

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
                'created_at' => '2024-09-18 10:00:00',
                'updated_at' => '2024-09-18 10:00:00',
            ],
            [
                'id' => 2,
                'numero_licence_rbq' => 'RBQ23456789',
                'statut' => 'Suspendue',
                'type_licence' => 'Construction résidentielle',
                'created_at' => '2024-09-18 11:00:00',
                'updated_at' => '2024-09-18 11:00:00',
            ],
            [
                'id' => 3,
                'numero_licence_rbq' => 'RBQ34567890',
                'statut' => 'Expirée',
                'type_licence' => 'Travaux spécialisés',
                'created_at' => '2024-09-18 12:00:00',
                'updated_at' => '2024-09-18 12:00:00',
            ],
            [
                'id' => 4,
                'numero_licence_rbq' => 'RBQ45678901',
                'statut' => 'Valide',
                'type_licence' => 'Plomberie et chauffage',
                'created_at' => '2024-09-18 13:00:00',
                'updated_at' => '2024-09-18 13:00:00',
            ],
            [
                'id' => 5,
                'numero_licence_rbq' => 'RBQ56789012',
                'statut' => 'Révoquée',
                'type_licence' => 'Génie civil',
                'created_at' => '2024-09-18 14:00:00',
                'updated_at' => '2024-09-18 14:00:00',
            ],
        ]);
    }
}
