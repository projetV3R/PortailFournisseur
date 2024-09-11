<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/loginFournisseur', function () {
    return view('login_fournisseur');
});
