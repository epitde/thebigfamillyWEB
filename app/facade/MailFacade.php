<?php

namespace App\facade;


use Illuminate\Support\Facades\Facade;

/**
 * Class MailFacade
 * @package app\facades
 */
class MailFacade extends Facade
{

    //bind the facade to MailService container
    protected static function getFacadeAccessor()
    {
        return 'mailService';
    }
}
