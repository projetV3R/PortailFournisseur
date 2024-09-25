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

Route::get('/categorie', [CategorieUNSPSCcontroller::class, 'index'])->name('categorie.index');
Route::post('/get-families', [CategorieUNSPSCcontroller::class, 'getFamilies']);
Route::post('/get-classes', [CategorieUNSPSCcontroller::class, 'getClasses']);
Route::post('/get-commodities', [CategorieUNSPSCcontroller::class, 'getCommodities']);

Route::get('/loginFournisseur', function () {
    return view('login_fournisseur');
});
