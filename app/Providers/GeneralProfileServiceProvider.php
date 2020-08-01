<?php

namespace App\Providers;

use App\services\GeneralProfile\GeneralProfileService;
use Illuminate\Support\ServiceProvider;

class GeneralProfileServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('generalProfileService', function () {

            return new GeneralProfileService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
