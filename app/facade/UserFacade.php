<?php

namespace App\facade;


use Illuminate\Support\Facades\Facade;

/**
 * Class UserFacade
 * @package app\facades
 */
class UserFacade extends Facade
{

    //bind the facade to UserService container
    protected static function getFacadeAccessor()
    {
        return 'userService';
    }
}
