<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void {}

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Configurer la route Livewire avec le préfixe de locale
        \Livewire\Livewire::setUpdateRoute(function ($handle) {
            return \Illuminate\Support\Facades\Route::post(
                "/{locale}/livewire/update",
                $handle,
            )
                ->where(["locale" => "fr|en|es|it"])
                ->middleware(["setLocale"]);
        });
    }
}
