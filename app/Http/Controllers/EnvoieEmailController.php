<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Log;


class EnvoieEmailController extends Controller
{
    public function lienEmail(Request $request)
{
    $request->validate(['adresse_courriel' => 'required|email']);

    // Utilisation de Log pour vérifier l'adresse utilisée
    Log::info('Adresse courriel utilisée pour le lien de réinitialisation : ' . $request->adresse_courriel);

    // Laravel s'attend à une clé 'email', nous remplaçons donc 'adresse_courriel' par 'email'
    $credentials = ['email' => $request->adresse_courriel];

    // Envoyer le lien de réinitialisation
    $status = Password::sendResetLink($credentials);

    return $status === Password::RESET_LINK_SENT
        ? response()->json(['message' => __($status)], 200)
        : response()->json(['message' => __($status)], 400);
}

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
        //
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
