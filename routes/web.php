<?php

use App\Http\Controllers\BrochureCarteAffaireController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CoordonneeController;
use App\Http\Controllers\FicheFournisseurController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\IdentificationController;
use App\Http\Controllers\LicenceController;
use App\Http\Controllers\ProduitServiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegionMunicipalitesController;







// Identification

Route::get('/Identification', [IdentificationController::class, "create"])->name("CreateIdentification");

Route::post('/Identification/store', [IdentificationController::class, "store"])->name("StoreIdentification");

// test

Route::get('/Redirection', [FicheFournisseurController::class, "redirection"])->name("redirection");

// Produits Services

Route::get('/ProduitsServices', [ProduitServiceController::class, "create"])->name("createProduitsServices");

Route::post('/ProduitsServices/store', [ProduitServiceController::class, "store"])->name("StoreProduitsServices");

Route::get('/produits-services/multiple', [ProduitServiceController::class, 'getMultiple'])->name('produits-services.getMultiple');

// Coordonnees

Route::post('/Coordonnees/store', [CoordonneeController::class, "store"])->name("StoreCoordonnees");

Route::get('/Coordonnees', [CoordonneeController::class, "create"])->name("CreateCoordonnees");
Route::get('/municipalites-par-region', [RegionMunicipalitesController::class, 'getMunicipalitesParRegion']);
Route::get('/region-par-municipalite', [RegionMunicipalitesController::class, 'getRegionByMunicipalite']);

// Licence

Route::get('/Licences', [LicenceController::class, "create"])->name("createLicences");
Route::post('/Licences/store', [LicenceController::class, "store"])->name("storeLicences");
Route::get('/sous-categories/{type}', [LicenceController::class, 'getSousCategories']);
//recuperer information dans page resume 
Route::get('/sous-categories/affichage/multiple', [LicenceController::class, 'getSousCategoriesMultiple']);
Route::get('/search', [ProduitServiceController::class, 'search']);

// Contact

Route::get('/Contacts', [ContactController::class, "create"])->name("createContacts");
Route::post('/Contacts/Store', [ContactController::class, "store"])->name("storeContacts");

// Brochure carte affaire

Route::get('/BrochuresCartesAffaires', [BrochureCarteAffaireController::class, "create"])->name("createBrochuresCartesAffaires");
Route::post('/BrochuresCartesAffaires/Store', [BrochureCarteAffaireController::class, "store"])->name("storeBrochuresCartesAffaires");
Route::post('/remove-uploaded-file', [BrochureCarteAffaireController::class, 'removeUploadedFile'])->name('removeUploadedFile');

//Route::post('/delete-temp-files', [BrochureCarteAffaireController::class, 'deleteTempFiles'])
//  ->name('deleteTempFiles');




// Finance

Route::get('/Finances', [FinanceController::class, "create"])->name("createFinances");
Route::post('/Finances/store', [FinanceController::class, "store"])->name("storeFinances");


// Login avec NEQ
Route::get('/FicheFournisseur/avecNeq', [FicheFournisseurController::class, "indexAvecNeq"])->name("showLoginFormAvecNeq");
Route::post('/FicheFournisseur/avecNeq/connexion', [FicheFournisseurController::class, "login"])->name("loginAvecNeq");

// Login sans NEQ
Route::get('/FicheFournisseur/sansNeq', [FicheFournisseurController::class, "indexSansNeq"])->name("showLoginFormSansNeq");
Route::post('/FicheFournisseur/sansNeq/connexion', [FicheFournisseurController::class, "login"])->name("loginSansNeq");

// Logout
Route::post('/FicheFournisseur/logout', [FicheFournisseurController::class, "logout"])->name("logout")->middleware('auth');

// Fiche Fournisseur
Route::get('/', [FicheFournisseurController::class, "create"])->name("login");
Route::post('/FicheFournisseur/store', [FicheFournisseurController::class, "store"])->name("FicheFournisseursStore");
Route::get('/FicheFournisseur/profil', [FicheFournisseurController::class, "profil"])->name("profil");
Route::get('/Resume', [FicheFournisseurController::class, "resume"])->name("resumeFournisseur");
