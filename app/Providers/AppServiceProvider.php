<?php

namespace App\Providers;

use App\Models\BrochureCarte;
use App\Models\Contact;
use App\Models\Coordonnee;
use App\Models\FicheFournisseur;
use App\Models\Finance;
use App\Models\Licence;
use App\Models\ProduitService;
use App\Models\SousCategorie;
use App\Models\Telephone;
use App\Observers\BrochureCarteObserver;
use App\Observers\ContactObserver;
use App\Observers\CoordonneeObserver;
use App\Observers\FicheFournisseurObserver;
use App\Observers\FinanceObserver;
use App\Observers\LicenceObserver;
use App\Observers\ProduitServiceObserver;
use App\Observers\SousCategorieObserver;
use App\Observers\TelephoneObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        BrochureCarte::observe(BrochureCarteObserver::class);
        Contact::observe(ContactObserver::class);
        Coordonnee::observe(CoordonneeObserver::class);
        Finance::observe(FinanceObserver::class);
        Licence::observe(LicenceObserver::class);
        ProduitService::observe(ProduitServiceObserver::class);
        SousCategorie::observe(SousCategorieObserver::class);
        Telephone::observe(TelephoneObserver::class);
        FicheFournisseur::observe(FicheFournisseurObserver::class);
    }
}
