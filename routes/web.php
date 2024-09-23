<?php

use App\Http\Controllers\controllerCategorieUNSPSC;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produits', [controllerCategorieUNSPSC::class, 'getProduits']);


Route::get('/loginFournisseur', function () {
    return view('login_fournisseur');
});
