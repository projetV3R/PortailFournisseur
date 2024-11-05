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
        if (auth()->check() || session()->has('identification')){
         $query = trim($request->get('recherche'));
         $categorie = $request->get('categorie');
     
         $produits = ProduitsServices::when($query, function($queryBuilder) use ($query) {
                 $queryBuilder->where('nature', 'LIKE', '%' . $query . '%')
                              ->orWhere('code_categorie', 'LIKE', '%' . $query . '%')
                              ->orWhere('code_unspsc', 'LIKE', '%' . $query . '%')
                              ->orWhere('description', 'LIKE', '%' . $query . '%');
             })
             ->when($categorie, function ($queryBuilder) use ($categorie) {
                 $queryBuilder->where('code_categorie', $categorie);
             })
             ->paginate(10);
     
         return response()->json($produits);
        }
        return redirect()->back();
     }
     

    public function getCategories()
    {
        if (auth()->check() || session()->has('identification')){
    $categories = ProduitsServices::select('code_categorie')
        ->distinct()
        ->orderBy('code_categorie', 'asc')
        ->pluck('code_categorie');

    return response()->json($categories);
        }
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!auth()->check() &&  session()->has('identification')){
        return view('formulaireInscription/Produits_services');
    }

    return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProduitServiceRequest $request)
    {
        if (!auth()->check() &&  session()->has('identification')){
        session()->put("produitsServices", $request->all());

        return redirect()->route('createLicences');
    }
     return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function getMultiple(Request $request)
    {
         if (auth()->check() || session()->has('identification')){
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
    return redirect()->back();
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
