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

Route::get('/LoginFournisseurSansNeq', function () {
    return view('login/login_fournisseur_sans_neq');
});

Route::get('/Identification', function () {
    return view('formulaireInscription/identification');
});

Route::get('/ProduitsServices', function () {
    return view('formulaireInscription/Produits_services');
});

Route::get('/LicencesAutorisations', function () {
    return view('formulaireInscription/licences_autorisations');
});

Route::get('/Coordonnees', function () {
    return view('formulaireInscription/coordonnees');
});
