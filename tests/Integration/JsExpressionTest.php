<?php

namespace Edofre\Fullcalendar\Test\Integration;

/**
 * Class JsExpressionTest
 * @package Edofre\Fullcalendar\Test\Integration
 */
class JsExpressionTest extends \Orchestra\Testbench\TestCase
{
    /** @test */
    public function generate_js_expression()
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

    /** @test */
    public function generate_wrong_js_expression()
    {
        $jsExpressionTest = new \Edofre\SliderPro\JsExpression("
                function() {
                    cnsl.lo('slider is initialized');
                }
            ");

        $this->assertNotEquals("
                function() {
                    console.log('slider is initialized');
                }
            ", $jsExpressionTest);
    }
}