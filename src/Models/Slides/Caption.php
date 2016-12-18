<?php

namespace Edofre\SliderPro\Models\Slides;

/**
 * Class Caption
 * @package Edofre\SliderPro\Models\Slides
 */
class Caption extends \Edofre\SliderPro\Models\SliderProModel
{
    /** Required class for the captions */
    const CAPTION_CLASS = 'sp-caption';

    /** @var  string The tag (a, div, span etc) that will be rendered */
    public $tag;
    /** @var  string The contents of the tag */
    public $content;
    /** @var  array The HTML options for the layer */
    public $htmlOptions;

    /**
     * @return string
     */
    public function render()
    {
        if (isset($this->htmlOptions['class'])) {
            $this->htmlOptions['class'] = self::CAPTION_CLASS . ' ' . $this->htmlOptions['class'];
        } else {
            $this->htmlOptions['class'] = self::CAPTION_CLASS;
        }

        //return \yii\bootstrap\Html::tag($this->tag, $this->content, $this->htmlOptions);
    }
}
