<?php

namespace services\facade;


use Illuminate\Support\Facades\Facade;

/**
 * Class FileFacade
 * @package services\facades
 */
class FileFacade extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'services\Files\FileService';
    }
}
