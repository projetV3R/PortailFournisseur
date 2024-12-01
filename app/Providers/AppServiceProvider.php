<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Providers\CustomUserProvider;
use App\Models\Finance;
use App\Observers\FinanceObserver;
use App\Models\FicheFournisseur;
use App\Observers\FicheFournisseurObserver;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\Filesystem;
use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use League\Flysystem\AzureBlobStorage\AzureBlobStorageAdapter;


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
        Storage::extend('azure', function ($app, $config) {
            $connectionString = config('filesystems.disks.azure.connection_string');
            $container = config('filesystems.disks.azure.container');
    
            $client = BlobRestProxy::createBlobService($connectionString);
    
            $adapter = new AzureBlobStorageAdapter($client, $container);
    
            $filesystem = new Filesystem($adapter);
    
            return new FilesystemAdapter($filesystem, $adapter);
        });
        
    }
}
