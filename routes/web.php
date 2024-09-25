<?php

use App\Http\Controllers\CategorieUNSPSCcontroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegionMunicipalitesController;

Route::get('/get-municipalites', [RegionMunicipalitesController::class, 'getMunicipalites']);


Route::get('/', function () {
    return view('welcome');
});


// Cette route permet de récupérer la liste des produits via la méthode 'getProduits' du contrôleur 'CategorieUNSPSCcontroller'
Route::get('/produits', [CategorieUNSPSCcontroller::class, 'getProduits']);

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
