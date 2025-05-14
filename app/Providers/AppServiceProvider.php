<?php

namespace App\Providers;

use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Http;
use App\Services\Cep\CepLookupInterface;
use App\Services\Cep\ViaCepService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CepLookupInterface::class, ViaCepService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Vite::prefetch(concurrency: 3);
        Http::macro('viacep', function () {
            return Http::withHeaders([
                'Accept' => 'application/json',
            ])->baseUrl(config('services.viacep.url'));
        });
    }
}
