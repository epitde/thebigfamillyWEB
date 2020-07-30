<?php

namespace App\Providers;

use App\services\OrganizationalProfile\OrganizationalProfileService;
use Illuminate\Support\ServiceProvider;

class OrganizationalProfileServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('orgnizationalProfileService', function () {

            return new OrganizationalProfileService();
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
