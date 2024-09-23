<?php

use App\Http\Controllers\CategorieUNSPSCcontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Cette route permet de récupérer la liste des produits via la méthode 'getProduits' du contrôleur 'CategorieUNSPSCcontroller'
Route::get('/produits', [CategorieUNSPSCcontroller::class, 'getProduits']);

Route::get('/loginFournisseur', function () {
    return view('login_fournisseur');
});
