<?php

namespace Edofre\Fullcalendar\Test\Integration;

/**
 * Class JsExpressionTest
 * @package Edofre\Fullcalendar\Test\Integration
 */
class JsExpressionTest extends \Orchestra\Testbench\TestCase
{
    /** @test */
    public function generate_event_with_id()
    {
        $jsExpressionTest = new \Edofre\SliderPro\JsExpression("
                function() {
                    console.log('slider is initialized');
                }
            ");

        $this->assertEquals("
                function() {
                    console.log('slider is initialized');
                }
            ", $jsExpressionTest);
    }
}