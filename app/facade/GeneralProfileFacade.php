<?php

namespace App\facade;


use Illuminate\Support\Facades\Facade;

/**
 * Class GeneralProfileFacade
 * @package app\facades
 */
class GeneralProfileFacade extends Facade
{

    //bind the facade to UserService container
    protected static function getFacadeAccessor()
    {
        return 'generalProfileService';
    }
}
