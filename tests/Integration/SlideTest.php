<?php

namespace Edofre\SliderPro\Test\Integration;

use Edofre\SliderPro\Models\Thumbnail;

/**
 * Class SlideTest
 * @package Edofre\SliderPro\Test\Integration
 */
class SlideTest extends TestCase
{
    /** @test */
    public function create_new_thumbnail()
    {
        $thumbnail = new Thumbnail([
            'tag'         => 'img',
            'htmlOptions' => [
                'src'      => "/images/test.jpg",
                'data-src' => "/images/test.jpg",
            ],
        ]);

        $this->assertEquals("<img src=\"/images/test.jpg\" data-src=\"/images/test.jpg\" class=\"sp-thumbnail\" ></img>", $thumbnail->render());
    }
}