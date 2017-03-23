<?php

namespace Edofre\SliderPro\Models;

/**
 * Class Thumbnail
 * @package Edofre\SliderPro\Models
 */
class Thumbnail extends \Edofre\SliderPro\Models\SliderProModel
{
    /** Required class for the thumbnails */
    const THUMBNAIL_CLASS = 'sp-thumbnail';

    /** @var */
    public $tag;
    /** @var */
    public $content;
    /** @var */
    public $htmlOptions = [];

    /**
     * @return string
     */
    public function render()
    {
        if (isset($this->htmlOptions['class'])) {
            $this->htmlOptions['class'] = self::THUMBNAIL_CLASS . ' ' . $this->htmlOptions['class'];
        } else {
            $this->htmlOptions['class'] = self::THUMBNAIL_CLASS;
        }

        $htmlOptions = " ";
        foreach ($this->htmlOptions as $option => $value) {
            $htmlOptions .= $option . '="' . $value . '" ';
        }

        return '<' . $this->tag . $htmlOptions . '>' . $this->content . '</' . $this->tag . '>';
    }
}