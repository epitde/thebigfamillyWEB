<?php

namespace App\facade;


use Illuminate\Support\Facades\Facade;

/**
 * Class OrganizationalProfileFacade
 * @package app\facades
 */
class OrganizationalProfileFacade extends Facade
{

    //bind the facade to UserService container
    protected static function getFacadeAccessor()
    {
        return 'organizationalProfileService';
    }
}
