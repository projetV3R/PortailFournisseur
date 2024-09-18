<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnspscController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/unspsc', [UnspscController::class, 'index']);

Route::get('/loginFournisseur', function () {
    return view('login_fournisseur');
});
