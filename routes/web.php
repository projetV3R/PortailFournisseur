<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegionMunicipalitesController;

Route::get('/get-municipalites', [RegionMunicipalitesController::class, 'getMunicipalites']);


Route::get('/', function () {
    return view('welcome');
});

Route::get('/loginFournisseur', function () {
    return view('login_fournisseur');
});
