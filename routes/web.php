<?php

use App\Http\Controllers\BrochureCarteAffaireController;
use App\Http\Controllers\CategorieUNSPSCcontroller;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CoordonneeController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\IdentificationController;
use App\Http\Controllers\LicenceController;
use App\Http\Controllers\ProduitServiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegionMunicipalitesController;
use App\Models\ProduitsServices;

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

// Identification

Route::get('/Identification', [IdentificationController::class, "create"])->name("CreateIdentification");

Route::post('/Identification', [IdentificationController::class, "store"])->name("StoreIdentification");

// Produits Services

Route::get('/ProduitsServices', [ProduitServiceController::class, "create"])->name("createProduitsServices");

Route::post('/ProduitsServices', [ProduitServiceController::class, "store"])->name("StoreProduitsServices");

Route::get('/ProduitsServicess', [ProduitServiceController::class, "index"])->name("IndexProduitsServices");

Route::get('/search', [ProduitServiceController::class, 'search']);


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
