<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/loginFournisseur', function () {
    return view('login/login_fournisseur');
});

Route::get('/LoginFournisseurAvecNeq', function () {
    return view('login/login_fournisseur_avec_neq');
});
