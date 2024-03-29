<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('mensajes', function () {

            return (Auth::user()->rol == 'peluquero' || Auth::user()->rol == 'admin');
        });

        Gate::define('usuarios', function () {
            return (Auth::user()->rol == 'peluquero' || Auth::user()->rol == 'admin');
        });

        Gate::define('servicios', function () {
            return (Auth::user()->rol == 'peluquero' || Auth::user()->rol == 'admin');
        });
    }
}
