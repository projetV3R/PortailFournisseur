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
    /**
     * Display a listing of the resource.
     */
    public function loginAvecNeq(LoginAvecNeqRequest $request)
    {
        // Essayer de connecter l'utilisateur
        $credentials = [
            'neq' => $request->numeroEntreprise, // Remplacez par le nom du champ approprié dans le formulaire
            'password' => $request->motDePasse, // Remplacez par le nom du champ approprié dans le formulaire
        ];

        // Essayer d'authentifier l'utilisateur
        if (Auth::attempt($credentials)) {
            // Connexion réussie
            return redirect()->route('CreateIdentification')->with('message', 'Connexion réussie');
        } else {
            // Journaliser les informations d'authentification pour voir les détails
            Log::error('Échec de connexion', ['credentials' => $credentials]);

            // Afficher une erreur personnalisée
            return back()->withErrors([
                'login_error' => 'Ces informations ne correspondent pas à nos enregistrements ou le mot de passe est incorrect.',
            ]);
        }
    }

    public function loginSansNeq(LoginSansNeqRequest $request)
    {

        // Essayer de connecter l'utilisateur
        $credentials = ['adresse_courriel' => $request->adresse_courriel, 'password' => $request->motDePasse];

        if (Auth::attempt($credentials)) {
            // Connexion réussie
            return redirect()->route('CreateIdentification')->with('message', 'Connexion réussie');
        } else {
            // Journaliser les informations d'authentification pour voir les détails
            Log::error('Echec de connexion', ['credentials' => $credentials]);

            // Afficher une erreur personnalisée
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

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('message', "Bye!");
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
