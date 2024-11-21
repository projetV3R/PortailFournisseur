<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

use App\Models\FicheFournisseur;

class NvxMotDePasseController extends Controller
{
    public function showResetForm($token)
    {
        return view('login.reset', ['token' => $token]);
    }


    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'adresse_courriel' => 'required|email',
            'password' => [
                'required',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{7,12}$/',
            ],
        ], [
            'adresse_courriel.required' => "L'adresse courriel est obligatoire.",
            'adresse_courriel.email' => "L'adresse courriel doit être une adresse valide.",
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
            'password.regex' => 'Le mot de passe doit contenir entre 7 et 12 caractères, avec au moins une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial.',

        ]);
        

        $credentials = $request->only('adresse_courriel', 'password', 'password_confirmation', 'token');

        $status = Password::reset(
            $credentials,
            function ($user, $password) {
                $user->password = Hash::make($password);
                $user->save();
            }
        );
        if ($status == Password::PASSWORD_RESET) {
            DB::table('password_reset_tokens')
                ->where('email', $request->adresse_courriel)
                ->delete();

            return redirect()->route('login')->with('status', __($status));
        } else {
            return view('password.lienDejaUtiliser');
        }
    }


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
