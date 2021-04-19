<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use App\Http\Responses\LoginResponse;
use Illuminate\Support\Facades\App;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(LoginResponseContract::class, LoginResponse::class);
        App::bind('mywebsite', function () {
            return new \App\Helpers\MyWebsite;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('roleorpermision', function ($roleOrPermission) {
            $rolesOrPermissions = is_array($roleOrPermission)
                ? $roleOrPermission
                : explode('|', $roleOrPermission);
            array_push($rolesOrPermissions, "Access All");

            if (!Auth::user()->hasAnyRole($rolesOrPermissions) && !Auth::user()->hasAnyPermission($rolesOrPermissions)) {
                return false;
            }

            return true;
        });
    }
}
