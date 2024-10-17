<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProduitServiceRequest;
use App\Models\ProduitsServices;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class ProduitServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function search(Request $request)
    {
        $query = trim($request->get('recherche'));
        $posts = ProduitsServices::where(function($queryBuilder) use ($query) {
            $queryBuilder->where('nature', 'LIKE', '%' . $query . '%')
                         ->orWhere('code_categorie', 'LIKE', '%' . $query . '%')
                         ->orWhere('code_unspsc', 'LIKE', '%' . $query . '%')
                         ->orWhere('description', 'LIKE', '%' . $query . '%');
        })->paginate(10);

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
        session()->put("produitsServices", $request->all());
        \Log::info('Données enregistrées dans la session produitsServices:', session('produitsServices'));

        return redirect()->route('createLicences');
    }

    /**
     * Display the specified resource.
     */
    public function getMultiple(Request $request)
    {
        $ids = $request->query('ids', []);
    

        if (!is_array($ids)) {
            return response()->json(['error' => 'Invalid parameter'], 400);
        }
    
  
        $validatedIds = array_filter($ids, function ($id) {
            return filter_var($id, FILTER_VALIDATE_INT) !== false;
        });
    
        if (empty($validatedIds)) {
            return response()->json([], 200);
        }
    
       
        $produits = ProduitsServices::whereIn('id', $validatedIds)->get();
    
        return response()->json($produits);
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
