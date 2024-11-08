<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Log;
use App\Models\FicheFournisseur;

class NvxMotDePasseController extends Controller
{
    /**
     * Show the password reset form.
     *
     * @param  string  $token
     * @return \Illuminate\View\View
     */
    public function showResetForm($token)
    {
        return view('login.reset', ['token' => $token]);
    }

    /**
     * Handle the password reset request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reset(Request $request)
    {
        // Valider les informations du formulaire
        $request->validate([
            'token' => 'required',
            'adresse_courriel' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        // Récupérer les informations nécessaires pour réinitialiser le mot de passe
        $credentials = $request->only('adresse_courriel', 'password', 'password_confirmation', 'token');

        // Réinitialiser le mot de passe
        $status = Password::reset(
            $credentials,
            function ($user, $password) {
                $user->password = Hash::make($password);
                $user->save();

                // Connecter automatiquement l'utilisateur après la réinitialisation du mot de passe
                auth()->login($user);
            }
        );

        // Redirection en fonction du résultat de la réinitialisation
        if ($status == Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('status', __($status));
        } else {
            return back()->withErrors(['adresse_courriel' => [__($status)]]);
        }
    }

    // Les autres méthodes de ressources (CRUD) peuvent être laissées telles quelles, mais elles ne sont pas nécessaires
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
