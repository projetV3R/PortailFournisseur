<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ParametreSysteme;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\BrochureCarteAffaireRequest;
use Log;
use Illuminate\Support\Facades\Auth;
class BrochureCarteAffaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!auth()->check()&&  session()->has('contacts')){
        $maxFileSize = ParametreSysteme::where('cle', 'taille_fichier')->value('valeur_numerique');
     //   session()->flush();
        return view("formulaireInscription/brochure_cartes_affaires", compact('maxFileSize'));
    }

    return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!auth()->check()&&  session()->has('contacts')){
        // Récupérer les brochures déjà en session
        $brochures = session('brochures_cartes_affaires', []);

        // Traiter la suppression des fichiers marqués
        $indicesASupprimer = $request->input('fichiers_a_supprimer', []);

        // S'assurer que les indices sont des entiers
        $indicesASupprimer = array_map('intval', $indicesASupprimer);
        
        foreach ($indicesASupprimer as $index) {
            if (isset($brochures[$index])) {
                // Supprimer le fichier physique
                Storage::delete($brochures[$index]['chemin']);
                // Supprimer du tableau
                unset($brochures[$index]);
            }
        }
        // Réindexer le tableau
        $brochures = array_values($brochures);

        // Traiter les nouveaux fichiers téléversés
        if ($request->hasFile('fichiers')) {
            foreach ($request->file('fichiers') as $fichier) {
                $path = $fichier->store('brochures_temp');
                $brochures[] = [
                    'nom' => $fichier->getClientOriginalName(),
                    'taille' => $fichier->getSize(),
                    'chemin' => $path,
                    'timestamp' => time(),
                ];
            }
        }

        // Mettre à jour la session
        session()->put('brochures_cartes_affaires', $brochures);

        return redirect()->route('resumeFournisseur')->with('success', 'Fichiers téléversés avec succès.');
        }
        return redirect()->back();
    }

  

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    { 
            $fournisseur = Auth::user();
            $maxFileSize = ParametreSysteme::where('cle', 'taille_fichier')->value('valeur_numerique');
            return view("modificationCompte/docModif" , compact('fournisseur','maxFileSize'));
    }

    public function getDocuments()
{
    $fournisseur = Auth::user();
    $brochures = $fournisseur->brochuresCarte->map(function($brochure) {
        return [
            'nom' => $brochure->nom,
            'taille' => $brochure->taille,
            'id' => $brochure->id
        ];
    });
    $maxFileSize = ParametreSysteme::where('cle', 'taille_fichier')->value('valeur_numerique');
    return response()->json([
        'brochures' => $brochures,
        'maxFileSize' => $maxFileSize 
    ]);
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
