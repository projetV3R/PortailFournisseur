<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\FicheFournisseur;
use Illuminate\Support\Facades\Auth;
use App\Models\Finance;
class FinanceController extends Controller
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
        $fournisseur = Auth::user();

        // Vérifie si la personne est co ,le statut accepter et ne possède pas une fiche finance
        if ($fournisseur && $fournisseur->etat === 'accepter' && !$fournisseur->finance()->exists()) {
            return view('formulaireInscription/Finances', compact('fournisseur'));
        }
        return redirect()->back()?: redirect()->route('/');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
