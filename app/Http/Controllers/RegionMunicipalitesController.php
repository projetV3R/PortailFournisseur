<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class RegionMunicipalitesController extends Controller
{
    public function getMunicipalites()
    {
        $response = Http::withoutVerifying()->get('https://donneesquebec.ca/recherche/api/action/datastore_search_sql', [
            'sql' => 'SELECT DISTINCT "munnom", "regadm" FROM "19385b4e-5503-4330-9e59-f998f5918363" ORDER BY "regadm", "munnom"'
        ]);
    
        if ($response->successful()) {
            $municipalites = $response->json()['result']['records'];
            return response()->json($municipalites);
      }
    
        return response()->json(['error' => 'Erreur lors de la récupération des municipalités'], 500);
    }
}
