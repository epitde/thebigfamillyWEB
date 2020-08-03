<?php

namespace App\facade;


use Illuminate\Support\Facades\Facade;

/**
 * Class UserDocumentFacade
 * @package app\facades
 */
class UserDocumentFacade  extends Facade
{

    //bind the facade to UserService container
    protected static function getFacadeAccessor()
    {
        return 'userDocumentService';
    }
}
