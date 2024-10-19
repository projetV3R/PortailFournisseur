<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TelephonesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('telephones')->insert([
            [
                'id' => 1,
                'numero_telephone' => '5145551234',
                'ligne' => 1,  // Valeur entière correspondant à la ligne
                'poste' => '101',
                'created_at' => '2024-09-18 10:00:00',
            ],
            [
                'id' => 2,
                'numero_telephone' => '4185555678',
                'ligne' => 2,
                'poste' => '102',
                'created_at' => '2024-09-18 10:30:00',
            ],
            [
                'id' => 3,
                'numero_telephone' => '4505557890',
                'ligne' => 3,
                'poste' => '103',
                'created_at' => '2024-09-18 11:00:00',
            ],
            [
                'id' => 4,
                'numero_telephone' => '6135553456',
                'ligne' => 4,
                'poste' => '104',
                'created_at' => '2024-09-18 11:30:00',
            ],
            [
                'id' => 5,
                'numero_telephone' => '8195559876',
                'ligne' => 5,
                'poste' => '105',
                'created_at' => '2024-09-18 12:00:00',
            ],
        ]);
    }
}
