<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Scraper Facade
 */
class Scraper extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'scraper';
    }
}
