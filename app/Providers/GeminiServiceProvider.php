<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use GeminiAPI\Client as GeminiClient;

class GeminiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(GeminiClient::class, function ($app) {
            $apiKey = config('gemini.api_key');
            return new GeminiClient($apiKey);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
