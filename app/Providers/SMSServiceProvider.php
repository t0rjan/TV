<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\SMS\DefaultMessage;

class SMSServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->singleton('sudas', function ($app) {


            dd($app);
//            return new DefaultMessage($app);
        });

//        $this->app->singleton('FooBar', function ($app) {
//            return new FooBar($app['SomethingElse']);
//        });
//
//        $this->app->singleton('FooBar', function ($app) {
//            return new FooBar($app['SomethingElse']);
//        });

    }
}
