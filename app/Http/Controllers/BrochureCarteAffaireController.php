<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ParametreSysteme;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\BrochureCarteAffaireRequest;
use Log;
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
        $maxFileSize = ParametreSysteme::where('cle', 'taille_fichier')->value('valeur_numerique');
     //   session()->flush();
        return view("formulaireInscription/brochure_cartes_affaires", compact('maxFileSize'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
        if (!$request->hasFile('fichiers')) {
            return back()->with('error', 'Aucun fichier envoyé.');
        }

        $brochures = [];

        foreach ($request->file('fichiers') as $fichier) {
            $path = $fichier->store('brochures_temp');
            $brochures[] = [
                'nom' => $fichier->getClientOriginalName(),
                'taille' => $fichier->getSize(),
                'chemin' => $path,
                'timestamp' => time(),
            ];
        }

        session()->put('brochures_cartes_affaires', $brochures);

        return redirect()->route('createContacts')->with('success', 'Fichiers téléversés avec succès.');
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
    public function edit(string $id)
    {
        //
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
