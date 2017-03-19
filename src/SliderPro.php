<?php

namespace Edofre\SliderPro;

use Illuminate\View\Factory;

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
     * @return string
     */
    public function generate()
    {
        return $this->script();
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