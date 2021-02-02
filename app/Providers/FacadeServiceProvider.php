<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Goutte\Client as GoutteClient;
use App\Classes\WebScraper;

class FacadeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind('scraper', function () {
            return new WebScraper(new GoutteClient());
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
