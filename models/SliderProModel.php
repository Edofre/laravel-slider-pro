<?php

namespace Edofre\SliderPro\Models;

/**
 * Class SliderProModel
 * @package Edofre\SliderPro\Models
 */
class SliderProModel
{
    /**
     * @param $args
     */
    function __construct($args)
    {
        foreach ($args as $key => $value) {
            $this->$key = $value;
        }
    }
}
