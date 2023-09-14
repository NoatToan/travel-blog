<?php

namespace App\Providers;

use Illuminate\Auth\SessionGuard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\JsonResource;

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
     * @throws \ReflectionException
     */
    public function boot()
    {
        JsonResource::withoutWrapping();
        $auth = Auth::user();
        SessionGuard::macro('fullName', function () use ($auth) {
            return $auth->first_name . ' ' . $auth->last_name;
        });
    }
}
