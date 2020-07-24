<?php

namespace services\facade;


use Illuminate\Support\Facades\Facade;

/**
 * Class ImageFacade
 * @package services\facades
 */
class ImageFacade extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'services\Images\ImageService';
    }
}
