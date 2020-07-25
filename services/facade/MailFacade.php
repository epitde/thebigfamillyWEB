<?php

namespace services\facade;


use Illuminate\Support\Facades\Facade;

/**
 * Class MailFacade
 * @package services\facades
 */
class MailFacade extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'services\Mails\MailService';
    }
}
