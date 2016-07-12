<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\SMS\DefaultMessage;
use App\Services\SMS\Cao;
use App\Services\SMS\Fuck;
use App\Services\SMS\Women;
use App\Services\SMS\SMSRepository;


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
        $this->app->bind('cao', function () {
            return new Cao();
        });

        $this->app->bind('fuck', function () {
            return new Fuck();
        });

        $this->app->bind('women', function () {
            return new Women();
        });

        $this->app->tag(['fuck', 'cao', 'women'], 'sms');


    }
}
