<?php

namespace App\facade;


use Illuminate\Support\Facades\Facade;

/**
 * Class ImageFacade
 * @package app\facade
 */
class ImageFacade extends Facade
{

    //bind the facade to ImageService container
    protected static function getFacadeAccessor()
    {
        return 'imageService';
    }
}
