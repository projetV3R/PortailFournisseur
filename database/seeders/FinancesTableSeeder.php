<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class FinancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('finances')->insert([
            [
                'id' => 1,
                'numero_tps' => 'TPS12345678',
                'numero_tvq' => 'TVQ87654321',
                'condition_paiement' => 'Net 30 jours',
                'devise' => 'CAD',
                'mode_communication' => 'Courriel',
                'fiche_fournisseur_id' => 1,
                'created_at' => '2024-09-18 10:00:00',
            ],
            [
                'id' => 2,
                'numero_tps' => 'TPS23456789',
                'numero_tvq' => 'TVQ98765432',
                'condition_paiement' => 'Net 15 jours',
                'devise' => 'USD',
                'mode_communication' => 'Téléphone',
                'fiche_fournisseur_id' => 2,
                'created_at' => '2024-09-18 11:00:00',
            ],
            [
                'id' => 3,
                'numero_tps' => 'TPS34567890',
                'numero_tvq' => 'TVQ09876543',
                'condition_paiement' => 'Net 45 jours',
                'devise' => 'EUR',
                'mode_communication' => 'Fax',
                'fiche_fournisseur_id' => 3,
                'created_at' => '2024-09-18 12:00:00',
            ],
            [
                'id' => 4,
                'numero_tps' => 'TPS45678901',
                'numero_tvq' => 'TVQ10987654',
                'condition_paiement' => 'Paiement à réception',
                'devise' => 'GBP',
                'mode_communication' => 'Courrier postal',
                'fiche_fournisseur_id' => 4,
                'created_at' => '2024-09-18 13:00:00',
            ],
            [
                'id' => 5,
                'numero_tps' => 'TPS56789012',
                'numero_tvq' => 'TVQ21098765',
                'condition_paiement' => 'Paiement anticipé',
                'devise' => 'CAD',
                'mode_communication' => 'Courriel',
                'fiche_fournisseur_id' => 5,
                'created_at' => '2024-09-18 14:00:00',
            ],
        ]);
    }
}
