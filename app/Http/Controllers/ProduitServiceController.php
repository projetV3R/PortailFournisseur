<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ProduitsServices;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Http\Requests\ProduitServiceRequest;


class ProduitServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('formulaireInscription/Produits_services');
    }

    public function search(Request $request)
    {
        $query = trim($request->get('recherche'));
        $posts = ProduitsServices::where(function ($queryBuilder) use ($query) {
            $queryBuilder->where('nature', 'LIKE', '%' . $query . '%')
                ->orWhere('code_categorie', 'LIKE', '%' . $query . '%')
                ->orWhere('categorie', 'LIKE', '%' . $query . '%')
                ->orWhere('code_unspsc', 'LIKE', '%' . $query . '%')
                ->orWhere('description', 'LIKE', '%' . $query . '%');
        })->paginate(20);

        return response()->json($posts);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('formulaireInscription/Produits_services');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProduitServiceRequest $request)
    {
        $produitServiceData = [
            'id' => $request->input('id')
        ];

        // Met les données soumises du formulaire dans la session sous la clé "licences"
        session()->put("produitsServices", $produitServiceData);

        // Enregistre les données dans les logs pour suivi et débogage
        Log::info('Données enregistrées dans la session produitsServices:', session('produitsServices'));

        // Redirige l'utilisateur vers la route 'CreateProduitsServices'
        return redirect()->route('createProduitsServices');
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
