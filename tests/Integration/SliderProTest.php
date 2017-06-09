<?php

namespace Edofre\SliderPro\Test\Integration;

use Edofre\SliderPro\SliderPro;

/**
 * Class SliderProTest
 * @package Edofre\SliderPro\Test\Integration
 */
class SliderProTest extends TestCase
{

    /** @test */
    public function generate_slider()
    {
        $slider = new SliderPro();
        $slider->setId('my-slider');
        $slider->setOptions([
            'sliderOptions' => [
                'width'  => 960,
                'height' => 500,
                'arrows' => true,
                'init'   => new \Edofre\SliderPro\JsExpression("
                        function() {
                            console.log('slider is initialized');
                        }
                    "),
            ],
        ]);

        // This looks terrible, I'm sorry...
        $this->assertEquals("<div class=\"slider-pro\" id=\"my-slider\">
    <div class=\"sp-slides\">
                    </div>
</div><link href=\"/css/slider-pro.css\" rel=\"stylesheet\">
<script type=\"text/javascript\" src=\"/js/slider-pro.js\"></script>

<script type=\"text/javascript\">
    jQuery(document).ready(function () {
        jQuery('#my-slider').sliderPro({\"sliderOptions\":{\"width\":960,\"height\":500,\"arrows\":true,\"init\":
                        function() {
                            console.log('slider is initialized');
                        }
                    }});
    });
</script>", $slider->generate());
    }

    /** @test */
    public function generate_slider_without_divs()
    {
        $slider = new SliderPro();
        $slider->setId('my-slider');
        $slider->setOptions([
            'sliderOptions' => [
                'width'  => 960,
                'height' => 500,
                'arrows' => true,
                'init'   => new \Edofre\SliderPro\JsExpression("
                        function() {
                            console.log('slider is initialized');
                        }
                    "),
            ],
        ]);

        // This looks terrible, I'm sorry...
        $this->assertEquals("<link href=\"/css/slider-pro.css\" rel=\"stylesheet\">
<script type=\"text/javascript\" src=\"/js/slider-pro.js\"></script>

<script type=\"text/javascript\">
    jQuery(document).ready(function () {
        jQuery('#my-slider').sliderPro({\"sliderOptions\":{\"width\":960,\"height\":500,\"arrows\":true,\"init\":
                        function() {
                            console.log('slider is initialized');
                        }
                    }});
    });
</script>", $slider->generate(false));
    }
}