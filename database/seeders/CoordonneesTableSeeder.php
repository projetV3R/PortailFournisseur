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
                'id' => 1,
                'numero_civique' => '123',
                'rue' => 'Rue Saint-Denis',
                'bureau' => 'A1',
                'ville' => 'Montréal',
                'province' => 'Québec',
                'site_internet' => 'https://example.com',
                'code_postal' => 'H2X 3K9',
                'code_region_administrative' => '06',
                'region_administrative' => 'Montréal',
                'created_at' => '2024-09-18 10:00:00',
            ],
            [
                'id' => 2,
                'numero_civique' => '456',
                'rue' => 'Boulevard René-Lévesque',
                'bureau' => 'B2',
                'ville' => 'Québec',
                'province' => 'Québec',
                'site_internet' => 'https://quebecweb.com',
                'code_postal' => 'G1R 2B3',
                'code_region_administrative' => '03',
                'region_administrative' => 'Capitale-Nationale',
                'created_at' => '2024-09-18 11:00:00',
            ],
            [
                'id' => 3,
                'numero_civique' => '789',
                'rue' => 'Avenue Laurier',
                'bureau' => 'C3',
                'ville' => 'Gatineau',
                'province' => 'Québec',
                'site_internet' => 'https://gatineau.ca',
                'code_postal' => 'J8T 4H5',
                'code_region_administrative' => '07',
                'region_administrative' => 'Outaouais',
                'created_at' => '2024-09-18 12:00:00',
            ],
            [
                'id' => 4,
                'numero_civique' => '101',
                'rue' => 'Rue Sherbrooke',
                'bureau' => 'D4',
                'ville' => 'Sherbrooke',
                'province' => 'Québec',
                'site_internet' => 'https://sherbrooke.ca',
                'code_postal' => 'J1H 3Z1',
                'code_region_administrative' => '05',
                'region_administrative' => 'Estrie',
                'created_at' => '2024-09-18 13:00:00',
            ],
            [
                'id' => 5,
                'numero_civique' => '202',
                'rue' => 'Chemin Sainte-Foy',
                'bureau' => 'E5',
                'ville' => 'Laval',
                'province' => 'Québec',
                'site_internet' => 'https://laval.ca',
                'code_postal' => 'H7V 3Z4',
                'code_region_administrative' => '13',
                'region_administrative' => 'Laval',
                'created_at' => '2024-09-18 14:00:00',
            ],
        ]);
    }
}
