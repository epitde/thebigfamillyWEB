<?php

namespace App\Providers;

use App\services\UserDocuments\UserDocumentService;
use Illuminate\Support\ServiceProvider;

class UserDocumentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('userDocumentService', function () {

            return new UserDocumentService();
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
