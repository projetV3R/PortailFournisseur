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


use App\Http\Controllers\EnvoieEmailController;
use App\Http\Controllers\NvxMotDePasseController;


// Identification

Route::get('/Identification', [IdentificationController::class, "create"])->name("CreateIdentification");
Route::post('/Identification/store', [IdentificationController::class, "store"])->name("StoreIdentification");

Route::post('/Identification/autoCompletageLicence', [IdentificationController::class, "autoCompletageLicence"])->name("AutoCompletageLicenceIdentification");

Route::post('/Identification/autoCompletageCoordonnees', [IdentificationController::class, "autoCompletageCoordonnees"])->name("AutoCompletageautoCompletageCoordonneeIdentification");

Route::get('/Identification/modif', [IdentificationController::class, "edit"])->name("EditIdentification")->middleware('auth');

Route::post('/Identification/update', [FicheFournisseurController::class, "updateProfile"])->name("UpdateIdentification")->middleware('auth');
//MDP
Route::post('/password/email', [EnvoieEmailController::class, 'lienEmail'])->name('password.email');
Route::get('/password/reset/{token}', [NvxMotDePasseController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [NvxMotDePasseController::class, 'reset'])->name('password.update');

// Produits Services

Route::get('/ProduitsServices', [ProduitServiceController::class, "create"])->name("createProduitsServices");
Route::post('/ProduitsServices/store', [ProduitServiceController::class, "store"])->name("StoreProduitsServices");
Route::get('/produits-services/multiple', [ProduitServiceController::class, 'getMultiple'])->name('produits-services.getMultiple');
Route::get('/categories', [ProduitServiceController::class, 'getCategories']);
Route::get('/produits-services/modif', [ProduitServiceController::class, "edit"])->name("EditProduit")->middleware('auth');
Route::post('/produits-services/update', [FicheFournisseurController::class, "updateProduit"])->name("UpdateProduit")->middleware('auth');
// Coordonnees

Route::post('/Coordonnees/store', [CoordonneeController::class, "store"])->name("StoreCoordonnees");

Route::get('/Coordonnees', [CoordonneeController::class, "create"])->name("CreateCoordonnees");
Route::get('/municipalites-par-region', [RegionMunicipalitesController::class, 'getMunicipalitesParRegion']);
Route::get('/region-par-municipalite', [RegionMunicipalitesController::class, 'getRegionByMunicipalite']);
Route::get('/Coordonnees/modif', [CoordonneeController::class, "edit"])->name("EditCoordonnee")->middleware('auth');
Route::post('/Coordonnees/update', [FicheFournisseurController::class, "updateCoordonnee"])->name("UpdateCoordonnee")->middleware('auth');
Route::get('/fournisseur/coordonnees/data', [CoordonneeController::class, 'getCoordonneeData'])->name('CoordonneesData');


// Licence

Route::get('/Licences', [LicenceController::class, "create"])->name("createLicences");
Route::post('/Licences/store', [LicenceController::class, "store"])->name("storeLicences");
Route::get('/sous-categories/{type}', [LicenceController::class, 'getSousCategories']);
Route::get('/sous-categorie/{code}', [LicenceController::class, 'getSousCategorieId'])
  ->name('sousCategorie.get');
//recuperer information dans page resume 
Route::get('/sous-categories/affichage/multiple', [LicenceController::class, 'getSousCategoriesMultiple']);
Route::get('/search', [ProduitServiceController::class, 'search']);
Route::get('/Licences/modif', [LicenceController::class, "edit"])->name("EditLicence")->middleware('auth');
Route::post('/Licences/update', [FicheFournisseurController::class, "updateLicence"])->name("UpdateLicence")->middleware('auth');
Route::get('/Licence/get-licence-data', [LicenceController::class, 'getLicenceData'])->name('getLicenceData');

// Contact

Route::get('/Contacts', [ContactController::class, "create"])->name("createContacts");
Route::post('/Contacts/Store', [ContactController::class, "store"])->name("storeContacts");
Route::get('/Contacts/modif', [ContactController::class, "edit"])->name("EditContact")->middleware('auth');
Route::post('/Contacts/update', [FicheFournisseurController::class, "updateContact"])->name("UpdateContact")->middleware('auth');
Route::get('/Contacts/getData', [ContactController::class, "getContacts"])->name("getContacts")->middleware('auth');
// Brochure carte affaire

Route::get('/BrochuresCartesAffaires', [BrochureCarteAffaireController::class, "create"])->name("createBrochuresCartesAffaires");
Route::post('/BrochuresCartesAffaires/Store', [BrochureCarteAffaireController::class, "store"])->name("storeBrochuresCartesAffaires");
Route::post('/remove-uploaded-file', [BrochureCarteAffaireController::class, 'removeUploadedFile'])->name('removeUploadedFile');
Route::get('/BrochuresCartesAffaires/modif', [BrochureCarteAffaireController::class, "edit"])->name("EditDoc")->middleware('auth');
Route::post('/BrochuresCartesAffaires/update', [FicheFournisseurController::class, "updateDoc"])->name("UpdateDoc")->middleware('auth');
Route::get('/Brochures/getDocuments', [BrochureCarteAffaireController::class, 'getDocuments']);


//Route::post('/delete-temp-files', [BrochureCarteAffaireController::class, 'deleteTempFiles'])
//  ->name('deleteTempFiles');




// Finance

Route::get('/Finances', [FinanceController::class, "create"])->name("createFinances");
Route::post('/Finances/store', [FinanceController::class, "store"])->name("storeFinances");
Route::get('/Finances/modif', [FinanceController::class, "edit"])->name("EditFinance")->middleware('auth');
Route::post('/Finances/update', [FicheFournisseurController::class, "updateFinance"])->name("UpdateFinance")->middleware('auth');

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
Route::get('/FicheFournisseur/profil', [FicheFournisseurController::class, "profil"])->name("profil")->middleware('auth');;
Route::get('/Resume', [FicheFournisseurController::class, "resume"])->name("resumeFournisseur");
Route::get('/Redirection', [FicheFournisseurController::class, "redirection"])->name("redirection");
Route::post('removeInscrit', [FicheFournisseurController::class, 'removeInscrit'])->name('removeInscrit');
Route::post('/Activation', [FicheFournisseurController::class, "reactivationFiche"])->name("reactivationFiche")->middleware('auth');
Route::post('/Desactivation', [FicheFournisseurController::class, 'desactivationFiche'])->name('desactivationFiche')->middleware('auth');
Route::delete('/licence/delete', [FicheFournisseurController::class, 'deleteLicence'])->name('deleteLicence')->middleware('auth');

//!!! ROUTE DE REDIRECTION ERREUR 404 TOUJOURS A LA FIN DU FICHIER DE ROUTE NE JAMAIS AVOIR DE ROUTE APRES !!!!
Route::fallback(function () {
  return response()->view('redirection.404', [], 404);
});