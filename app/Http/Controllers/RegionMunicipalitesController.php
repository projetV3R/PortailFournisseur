<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Notifications\WelcomeEmail;
use Illuminate\Support\Facades\Notification;
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

    public function sendWelcomeEmailTest()
    {
        // Définir l'adresse email de test
        $emailTest = 'nathanalexandromichel@gmail.com';
        
        // Créer un objet d'utilisateur fictif avec le nom et l'email
        $fakeUser = (object)[
            'name' => 'Nathan Michel',
            'email' => $emailTest,
        ];

        // Envoyer l'email de bienvenue
        Notification::route('mail', $emailTest)->notify(new WelcomeEmail());

        // Retourner une réponse indiquant que l'email a été envoyé
        return response()->json(['message' => 'Email de bienvenue envoyé à ' . $emailTest]);
    }
}
