<?php

namespace services\facade;


use Illuminate\Support\Facades\Facade;

/**
 * Class UserFacade
 * @package services\facades
 */
class UserFacade extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'services\Users\UserService';
    }
}
