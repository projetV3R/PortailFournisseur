<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CoordonneeRequest;
use App\Models\Coordonnee;
use Illuminate\Http\Request;
use Log;
use Illuminate\Support\Facades\Auth;
class CoordonneeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coordonnees = Coordonnee::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    // session()->flush();
    if (!auth()->check() && session()->has('licences')){
        return view("formulaireInscription/coordonnees");
    }

    return redirect()->back();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(CoordonneeRequest $request)
    {
        if (!auth()->check() && session()->has('licences')){
       
        $currentIndex = $request->input('currentIndex', 0);
        session()->put("coordonnees", $request->all());
        
        session()->put("currentIndex", $currentIndex);
  
      
        return redirect()->route('createContacts');
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
        $coordonnee = $fournisseur->coordonnee()->with('telephones')->first();
        return view('modificationCompte.coordonneeModif', compact('fournisseur', 'coordonnee'));
    }

    public function getCoordonneeData()
{
    $fournisseur = Auth::user();
    if (!$fournisseur) {
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    $coordonnee = $fournisseur->coordonnee()->with('telephones')->first();

    $coordonneeData = [
        'numeroCivique' => $coordonnee->numero_civique,
        'bureau' => $coordonnee->bureau,
        'rue' => $coordonnee->rue,
        'codePostale' => $coordonnee->code_postal,
        'province' => $coordonnee->province,
        'regionAdministrative' => $coordonnee->region_administrative,
        'siteWeb' => $coordonnee->site_internet,
        'municipalite' => $coordonnee->ville,
        'municipaliteInput' => $coordonnee->ville,
        'ligne' => []
    ];

    $telephones = $coordonnee->telephones;

    foreach ($telephones as $index => $telephone) {
        $coordonneeData['ligne'][$index] = [
            'type' => $telephone->type,
            'numeroTelephone' => $telephone->numero_telephone,
            'poste' => $telephone->poste
        ];
    }

    return response()->json(['coordonnee' => $coordonneeData]);
}

    
    /**
     * Update the specified resource in storage.
     */



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
