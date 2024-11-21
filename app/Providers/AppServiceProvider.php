<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Providers\CustomUserProvider;
use App\Models\Finance;
use App\Observers\FinanceObserver;
use App\Models\FicheFournisseur;
use App\Observers\FicheFournisseurObserver;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Auth::provider('custom', function ($app, array $config) {
            return new CustomUserProvider($app['hash'], $config['model']);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Finance::observe(FinanceObserver::class);
        FicheFournisseur::observe(FicheFournisseurObserver::class);
   
    }
}
