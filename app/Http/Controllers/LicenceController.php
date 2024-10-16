<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LicenceRequest;
use Illuminate\Http\Request;
use Log;

class LicenceController extends Controller
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
        return view('formulaireInscription/licences_autorisations');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LicenceRequest $request)
    {
        session()->put("licences", $request->all());
        \Log::info('Données enregistrées dans la session licences:', session('licences'));

        return redirect()->route('CreateCoordonnees');
    }
    public function getSousCategories($type)
    {
        // Récupérer les sous-catégories correspondant au type de licence, en gérant les champs multi-catégories
        $sousCategories = \DB::table('sous_categories')
            ->where('categorie', 'LIKE', "%$type%") // Vérifie si le type est contenu dans la colonne
            ->get();
    
        return response()->json($sousCategories);
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
