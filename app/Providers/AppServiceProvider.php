<?php

namespace App\Providers;

use AzureOss\FlysystemAzureBlobStorage\AzureBlobStorageAdapter;
use AzureOss\LaravelAzureStorageBlob\AzureStorageBlobAdapter;
use AzureOss\Storage\Blob\BlobContainerClient;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;
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
        //
        Storage::extend('azure', function(Application $app, array $config) {
            $uri = new \GuzzleHttp\Psr7\Uri($config['url']);
            $sharedKeyCredential = new \AzureOss\Storage\Common\Auth\StorageSharedKeyCredential($config['name'], $config['key']);

            $client = new BlobContainerClient($uri, $sharedKeyCredential);
            $adapter = new AzureBlobStorageAdapter($client);
            return new Filesystem($adapter);
        });
    }
}
