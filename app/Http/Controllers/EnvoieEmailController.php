<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\App;


class EnvoieEmailController extends Controller
{
    public function lienEmail(Request $request)
    {
        $request->validate(['adresse_courriel' => 'required|email']);

        //App::setLocale('fr');
        Log::info('Adresse courriel utilisée pour le lien de réinitialisation : ' . $request->adresse_courriel);

        $credentials = ['email' => $request->adresse_courriel];

        $status = Password::sendResetLink($credentials);

        if ($status === Password::RESET_LINK_SENT) {
            return response()->json(['message' => 'Email envoyé! Si cet email existe, un lien de réinitialisation vous a été envoyé.'], 200);
        }

        return response()->json(['message' => 'Email envoyé! Si cet email existe, un lien de réinitialisation vous a été envoyé.'], 200);
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
