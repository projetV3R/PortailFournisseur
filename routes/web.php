<?php

use App\Http\Controllers\BrochureCarteAffaireController;
use App\Http\Controllers\CategorieUNSPSCcontroller;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CoordonneeController;
use App\Http\Controllers\FicheFournisseurController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\IdentificationController;
use App\Http\Controllers\LicenceController;
use App\Http\Controllers\ProduitServiceController;
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

// ProfilFournisseur

Route::get('/ProfilFournisseur', function () {
    return view('formulaireInscription/profil_fournisseur');
});

// Identification

Route::get('/Identification', [IdentificationController::class, "create"])->name("CreateIdentification")->middleware('auth');

Route::post('/Identification', [IdentificationController::class, "store"])->name("StoreIdentification");

// Produits Services

Route::get('/ProduitsServices', [ProduitServiceController::class, "create"])->name("createProduitsServices");

Route::post('/ProduitsServices', [ProduitServiceController::class, "store"])->name("StoreProduitsServices");


// Coordonnees

Route::post('/Coordonnees', [CoordonneeController::class, "store"])->name("StoreCoordonnees");

Route::get('/Coordonnees', [CoordonneeController::class, "create"])->name("CreateCoordonnees");

// Licence

Route::get('/Licences', [LicenceController::class, "create"])->name("createLicences");

Route::post('/Licences', [LicenceController::class, "store"])->name("storeLicences");

// Contact

Route::get('/Contacts', [ContactController::class, "create"])->name("createContacts");

Route::post('/Contacts', [ContactController::class, "store"])->name("storeContacts");

// Brochure carte affaire

Route::get('/BrochuresCartesAffaires', [BrochureCarteAffaireController::class, "create"])->name("createBrochuresCartesAffaires");

Route::post('/BrochuresCartesAffaires', [BrochureCarteAffaireController::class, "store"])->name("storeBrochuresCartesAffaires");

// Finance

Route::get('/Finances', [FinanceController::class, "create"])->name("createFinances");

Route::post('/Finances', [FinanceController::class, "store"])->name("storeFinances");


// Login avec NEQ
Route::get('/FicheFournisseur/avecNeq', [FicheFournisseurController::class, "indexAvecNeq"])->name("showLoginFormAvecNeq");
Route::post('/FicheFournisseur/avecNeq', [FicheFournisseurController::class, "loginAvecNeq"])->name("loginAvecNeq");

// Login sans NEQ
Route::get('/FicheFournisseur/sansNeq', [FicheFournisseurController::class, "indexSansNeq"])->name("showLoginFormSansNeq");
Route::post('/FicheFournisseur/sansNeq', [FicheFournisseurController::class, "loginSansNeq"])->name("loginSansNeq");

// Logout
Route::post('/FicheFournisseur/logout', [FicheFournisseurController::class, "logout"])->name("logout");


// Création Fiche Fournisseur
Route::get('/FicheFournisseur/choix', [FicheFournisseurController::class, "create"])->name("login");
