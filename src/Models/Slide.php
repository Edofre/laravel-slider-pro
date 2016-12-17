<?php

namespace Edofre\SliderPro\Models;

/**
 * Class Slide
 * @package Edofre\SliderPro\Models
 */
class Slide extends \Edofre\SliderPro\Models\SliderProModel
{
    /** @var  string The string contents that will be rendered without any object interference */
    public $content = '';
    /** @var  array Contains objects from the /model folder, will be appended behind the $this->content string */
    public $items = [];

    /**
     * Append the objects after the $this->content string
     * @return string
     */
    public function render()
    {
        if (empty($items)) {
            foreach ($this->items as $item) {
                $this->content .= $item->render();
            }
        }
        return $this->content;
    }
}
