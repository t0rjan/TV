<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Auth;
use App\Services\Auth\CustomSessionGuard;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {

        $this->registerPolicies($gate);

        Auth::extend('custom.session.guard', function ($app, $name, array $config) {


            $provider = Auth::createUserProvider($config['provider']);


            return new CustomSessionGuard($name, $provider, $app['session.store'], $app->request);
        });


    }

}
