<?php

namespace Edofre\SliderPro\Test\Integration;

/**
 * Class EventTest
 * @package Edofre\SliderPro\Test\Integration
 */
abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * Do any setup
     */
    public function setUp()
    {
        parent::setUp();
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            \Edofre\SliderPro\SliderProServiceProvider::class,
        ];
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            'SliderPro' => \Edofre\SliderPro\Facades\SliderPro::class,
        ];
    }
}