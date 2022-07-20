<?php

namespace App\Providers;

use Illuminate\Auth\SessionGuard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $auth = Auth::user();
        SessionGuard::macro('fullName', function () use ($auth) {
            return $auth->first_name . ' ' . $auth->last_name;
        });
    }
}
