<?php

namespace services\facade;


use Illuminate\Support\Facades\Facade;

/**
 * Class LanguageFacade
 * @package services\facades
 */
class LanguageFacade extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'services\Languages\LanguageService';
    }
}
