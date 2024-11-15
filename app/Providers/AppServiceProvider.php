<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Finance;
use App\Observers\FinanceObserver;


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
        Finance::observe(FinanceObserver::class);
   
    }
}
