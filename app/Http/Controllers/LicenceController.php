<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LicenceRequest;
use Illuminate\Http\Request;
use App\Models\SousCategorie;
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
        if (!auth()->check()){
        return view('formulaireInscription/licences_autorisations');

    }

    return redirect()->route('profil')->withErrors('Veuillez vous déconnecter si vous voulez créer un compte.');
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
        $sousCategories = \DB::table('sous_categories')
            ->where('categorie', 'LIKE', "%$type%")
            ->get();
    
        return response()->json($sousCategories);
    }
    
    
    public function getSousCategoriesMultiple(Request $request)
    {
        $ids = $request->query('ids', []);
    
        if (!is_array($ids) || empty($ids)) {
            return response()->json([], 200);
        }
    
   
        $validatedIds = array_filter($ids, function ($id) {
            return filter_var($id, FILTER_VALIDATE_INT) !== false;
        });
    
    
        $sousCategories = SousCategorie::whereIn('id', $validatedIds)->get();
    
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
