<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoordonneesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('coordonnees')->insert([
            [
                'numero_civique' => '123',
                'rue' => 'Rue des Fleurs',
                'bureau' => 'A1',
                'ville' => 'Montréal',
                'province' => 'Québec',
                'site_internet' => 'https://exemple1.com',
                'code_postal' => 'H1A 1A1',
                'code_region_administrative' => '06',
                'region_administrative' => 'Montréal',
                'telephones' => json_encode([
                    ['ligne' => 'mobile', 'numero_telephone' => '819-567-8901', 'poste' => '3434'],
                    ['ligne' => 'fixe', 'numero_telephone' => '819-234-5678', 'poste' => '2343']
                ]),
            ],
            [
                'numero_civique' => '456',
                'rue' => 'Avenue des Pins',
                'bureau' => 'B2',
                'ville' => 'Québec',
                'province' => 'Québec',
                'site_internet' => 'https://exemple2.com',
                'code_postal' => 'G1B 2B2',
                'code_region_administrative' => '03',
                'region_administrative' => 'Capitale-Nationale',
                'telephones' => json_encode([
                    ['ligne' => 'mobile', 'numero_telephone' => '819-567-8901', 'poste' => '3434'],
                    ['ligne' => 'fixe', 'numero_telephone' => '819-234-5678', 'poste' => '2343']
                ]),
            ],
            [
                'numero_civique' => '789',
                'rue' => 'Boulevard René-Lévesque',
                'bureau' => 'C3',
                'ville' => 'Sherbrooke',
                'province' => 'Québec',
                'site_internet' => 'https://exemple3.com',
                'code_postal' => 'J1J 3J3',
                'code_region_administrative' => '05',
                'region_administrative' => 'Estrie',
                'telephones' => json_encode([
                    ['ligne' => 'mobile', 'numero_telephone' => '819-567-8901', 'poste' => '3434'],
                    ['ligne' => 'fixe', 'numero_telephone' => '819-234-5678', 'poste' => '2343']
                ]),
            ],
            [
                'numero_civique' => '101',
                'rue' => 'Rue St-Denis',
                'bureau' => 'D4',
                'ville' => 'Laval',
                'province' => 'Québec',
                'site_internet' => 'https://exemple4.com',
                'code_postal' => 'H7G 4H4',
                'code_region_administrative' => '13',
                'region_administrative' => 'Laval',
                'telephones' => json_encode([
                    ['ligne' => 'mobile', 'numero_telephone' => '819-567-8901', 'poste' => '3434'],
                    ['ligne' => 'fixe', 'numero_telephone' => '819-234-5678', 'poste' => '2343']
                ]),
            ],
            [
                'numero_civique' => '202',
                'rue' => 'Chemin des Bois',
                'bureau' => 'E5',
                'ville' => 'Gatineau',
                'province' => 'Québec',
                'site_internet' => 'https://exemple5.com',
                'code_postal' => 'J8T 5T5',
                'code_region_administrative' => '07',
                'region_administrative' => 'Outaouais',
                'telephones' => json_encode([
                    ['ligne' => 'mobile', 'numero_telephone' => '819-567-8901', 'poste' => '3434'],
                    ['ligne' => 'fixe', 'numero_telephone' => '819-234-5678', 'poste' => '2343']
                ]),
            ],
        ]);
    }
}
