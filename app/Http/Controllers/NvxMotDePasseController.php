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
    Log::Debug('1');
    $request->validate([
        'token' => 'required',
        'adresse_courriel' => 'required|email',
        'password' => 'required|confirmed|string|min:7|max:12',
    ]);
    Log::Debug('2');


    $credentials = $request->only('adresse_courriel', 'password', 'password_confirmation', 'token');

    $status = Password::reset(
        $credentials,
        function ($user, $password) {
            $user->password = Hash::make($password);
            $user->save();
        }
    );
    Log::Debug('3');

    if ($status == Password::PASSWORD_RESET) {
        Log::Debug('4');

        DB::table('password_reset_tokens')
            ->where('email', $request->adresse_courriel)
            ->delete();

        return redirect()->route('login')->with('status', __($status));
        Log::Debug('5');

    } else {
        Log::Debug('6');
        return view('password.lienDejaUtiliser');
        Log::Debug('7');

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
