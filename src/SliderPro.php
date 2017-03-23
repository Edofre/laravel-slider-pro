<?php

namespace Edofre\SliderPro;

/**
 * Class SliderPro
 * @package Edofre\SliderPro
 */
class SliderPro
{
    /** @var */
    public $id = 'slider-pro';
    /** @var array */
    public $sliderOptions = [];
    /** @var array */
    public $slides = [];
    /** @var array */
    public $thumbnails = [];

    /**
     * @param bool $render_div
     * @return string
     */
    public function generate($render_div = true)
    {
        if ($render_div) {
            return $this->sliderPro() . $this->script();
        }
        return $this->script();
    }

    /**
     * Create the <div> the slider will be rendered into
     * @return string
     */
    private function sliderPro()
    {
        return view('slider-pro::slider', [
            'id'         => $this->getId(),
            'slides'     => $this->slides,
            'thumbnails' => $this->thumbnails,
        ]);
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Get the <script> block to render the calendar
     * @return \Illuminate\View\View
     */
    private function script()
    {
        return view('slider-pro::script', [
            'id'      => $this->getId(),
            'options' => $this->getOptionsJson(),
        ]);
    }

    /**
     * Encode the JSON properly to format the callbacks
     * @return string
     */
    public function getOptionsJson()
    {
        return JsonEncoder::encode($this->sliderOptions);
    }

    /**
     * @param array $options
     */
    public function setOptions(array $options)
    {
        $this->sliderOptions = $options;
    }
}