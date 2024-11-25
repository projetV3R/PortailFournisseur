<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LicenceRequest;
use Illuminate\Http\Request;
use App\Models\SousCategorie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log as Log;

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
        if (!auth()->check() && session()->has('produitsServices')) {
            if (session()->has('autoCompletageLicences')) {
                $autoCompleteData = session('autoCompletageLicences');

                session()->put('licences.numeroLicence', $autoCompleteData['numeroLicence'] ?? null);
                session()->put('licences.statut', $autoCompleteData['statut'] ?? null);
                session()->put('licences.typeLicence', $autoCompleteData['typeLicence'] ?? null);
                session()->put('licences.sousCategorie', $autoCompleteData['sousCategorie'] ?? []);

                dd(session('licences'));
                Log::info('Données synchronisées dans licences :', session('licences'));
            }
            return view('formulaireInscription/licences_autorisations');
        }
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LicenceRequest $request)
    {

        if (!auth()->check() && session()->has('produitsServices')) {
            session()->put('licences', $request->all());
            return redirect()->route('CreateCoordonnees');
        }

        return redirect()->back();
    }


    public function getSousCategories($type)
    {
        if (auth()->check() || session()->has('produitsServices')) {

            $sousCategories = \DB::table('sous_categories')
                ->where('categorie', 'LIKE', "%$type%")
                ->select('id', 'code_sous_categorie', 'travaux_permis', 'type')
                ->get()
                ->groupBy('type');

            return response()->json($sousCategories);
        }
        return redirect()->back();
    }

    public function getSousCategorieId($code)
    {
        try {
            $sousCategorie = \DB::table('sous_categories')
                ->where('code_sous_categorie', 'LIKE', "$code%")
                ->select('id')
                ->first();

            if ($sousCategorie) {
                return response()->json(['id' => $sousCategorie->id]);
            }

            return response()->json(['message' => 'Code sous-catégorie non trouvé.'], 404);
        } catch (\Exception $e) {

            return response()->json(['message' => 'Erreur interne', 'error' => $e->getMessage()], 500);
        }
    }

    public function getSousCategoriesMultiple(Request $request)
    {
        if (auth()->check() || session()->has('produitsServices')) {
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
        return redirect()->back();
    }

    public function getLicenceData()
    {
        $fournisseur = Auth::user();
        $licence = $fournisseur->licence()->with('sousCategories.categorie')->first();

        return response()->json([
            'licence' => $licence,
            'selectedSousCategories' => $licence ? $licence->sousCategories->pluck('sous_categorie_id')->toArray() : [],
        ]);
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
        return view("modificationCompte/licenceModif", compact('fournisseur'));
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
