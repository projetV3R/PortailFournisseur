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
        return view("formulaireInscription/brochure_cartes_affaires", compact('maxFileSize'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrochureCarteAffaireRequest $request)
    {
        $fichiers = $request->file('fichiers');
    
        $brochures = [];
        foreach ($fichiers as $fichier) {
            $path = $fichier->store('brochures_temp'); // Stock temporaire
            $brochures[] = [
                'nom' => $fichier->getClientOriginalName(),
                'type_de_fichier' => $fichier->getClientOriginalExtension(),
                'taille' => $fichier->getSize(),
                'chemin' => $path
            ];
        }
        Log::info('Brochures enregistreés : ', $request->all());
       
        session()->put('brochures_cartes_affaires', $brochures);
        return response()->json(['success' => true]);
      
    }
    public function delete(Request $request)
{
    $path = $request->input('path');

    if (Storage::exists($path)) {
        Storage::delete($path); // Suppression du fichier
        return response()->json(['success' => true, 'message' => 'Fichier supprimé avec succès.']);
    }

    return response()->json(['success' => false, 'message' => 'Fichier non trouvé.'], 404);
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
