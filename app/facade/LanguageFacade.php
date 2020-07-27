<?php

namespace App\facade;


use Illuminate\Support\Facades\Facade;

/**
 * Class LanguageFacade
 * @package app\facades
 */
class LanguageFacade extends Facade
{

    //bind the facade to LanguageService container
    protected static function getFacadeAccessor()
    {
        return 'languageService';
    }
}
