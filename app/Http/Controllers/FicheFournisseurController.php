<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginAvecNeqRequest;
use App\Http\Requests\LoginSansNeqRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class FicheFournisseurController extends Controller
{

    public function login(Request $request)
    {
        if ($request->has('numeroEntreprise')) {
            $request->validate([
                'numeroEntreprise' => 'required|string|max:255',
                'motDePasse' => 'required|string',
            ]);

            $credentials = [
                'neq' => $request->numeroEntreprise,
                'password' => $request->motDePasse,
            ];
        } elseif ($request->has('adresse_courriel')) {
            $request->validate([
                'adresse_courriel' => 'required|email|max:255',
                'motDePasse' => 'required|string',
            ]);

            $credentials = [
                'adresse_courriel' => $request->adresse_courriel,
                'password' => $request->motDePasse,
            ];
        } else {
            return back()->withErrors([
                'login_error' => 'Vous devez fournir soit un numéro d\'entreprise (NEQ) soit une adresse courriel.',
            ]);
        }

        if (Auth::attempt($credentials)) {
            return redirect()->route('CreateIdentification')->with('message', 'Connexion réussie');
        } else {
            Log::error('Échec de connexion', ['credentials' => $credentials]);

            return back()->withErrors([
                'login_error' => 'Ces informations ne correspondent pas à nos enregistrements ou le mot de passe est incorrect.',
            ]);
        }
    }

    public function indexAvecNeq()
    {
        return view('login/login_fournisseur_avec_neq');
    }

    public function indexSansNeq()
    {
        return view('login/login_fournisseur_sans_neq');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        session()->flush();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login')->with('message', 'Déconnexion réussie');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('login/login_fournisseur');
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
