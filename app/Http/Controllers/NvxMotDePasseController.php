<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Log;
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
            'password' => 'required|confirmed|string|min:7|max:12',

        ]);

        $credentials = $request->only('adresse_courriel', 'password', 'password_confirmation', 'token');

        $status = Password::reset(
            $credentials,
            function ($user, $password) {
                $user->password = Hash::make($password);
                $user->save();

                auth()->login($user);
            }
        );

        if ($status == Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('status', __($status));
        } else {
            return back()->withErrors(['adresse_courriel' => [__($status)]]);
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
