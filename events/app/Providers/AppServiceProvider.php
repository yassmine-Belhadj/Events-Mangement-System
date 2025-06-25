<?php

namespace App\Providers;

use App\Models\Configuration;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
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
        try {

            view()->composer('*', function ($view) {
                $view->with('user', Auth::user());
                $view->with('currentRoute',Route::current());
            });

        } catch (Exception $exception) {
            Log::error($exception);
        }
    }
}
