<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(ProduitsServicesTableSeeder::class);
        $this->call(FinancesTableSeeder::class);
        $this->call(CoordonneesTableSeeder::class);
        $this->call(LicencesTableSeeder::class);
        $this->call(FicheFournisseursTableSeeder::class);
        $this->call(BrochuresCartesTableSeeder::class);
        $this->call(ContactsTableSeeder::class);
        $this->call(TelephonesTableSeeder::class);
        $this->call(ProduitServiceFicheFournisseurTableSeeder::class);


        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
