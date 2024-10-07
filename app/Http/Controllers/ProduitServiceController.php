<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProduitServiceRequest;
use App\Models\ProduitsServices;
use Illuminate\Http\Request;

class ProduitServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produitsServices = ProduitsServices::all();
        return view('formulaireInscription/Produits_services', compact('produitsServices'));
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

        return redirect()->route('createLicences');
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
