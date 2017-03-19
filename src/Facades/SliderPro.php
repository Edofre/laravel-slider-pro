<?php

namespace Edofre\SliderPro\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class SliderPro
 * @package Edofre\SliderPro\Facades
 */
class SliderPro extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-slider-pro';
    }
}