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

Route::get('/municipalites-par-region', [RegionMunicipalitesController::class, 'getMunicipalitesParRegion']);


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





// Identification

Route::get('/Identification', [IdentificationController::class, "create"])->name("CreateIdentification");

Route::post('/Identification/store', [IdentificationController::class, "store"])->name("StoreIdentification");


// Produits Services

Route::get('/ProduitsServices', [ProduitServiceController::class, "create"])->name("createProduitsServices");

Route::post('/ProduitsServices/store', [ProduitServiceController::class, "store"])->name("StoreProduitsServices");

Route::get('/produits-services/multiple', [ProduitServiceController::class, 'getMultiple'])->name('produits-services.getMultiple');

// Coordonnees

Route::post('/Coordonnees/store', [CoordonneeController::class, "store"])->name("StoreCoordonnees");

Route::get('/Coordonnees', [CoordonneeController::class, "create"])->name("CreateCoordonnees");

// Licence

Route::get('/Licences', [LicenceController::class, "create"])->name("createLicences");

Route::post('/Licences/store', [LicenceController::class, "store"])->name("storeLicences");

Route::get('/sous-categories/{type}', [LicenceController::class, 'getSousCategories']);
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

Route::post('/Finances', [FinanceController::class, "store"])->name("storeFinances");

// Resume

Route::get('/Resume', function () {
    return view('formulaireInscription/resume');
});
