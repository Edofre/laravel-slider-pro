<?php

namespace Edofre\SliderPro;

use Illuminate\Support\ServiceProvider;

/**
 * Class SliderProServiceProvider
 * @package Edofre\SliderPro
 */
class SliderProServiceProvider extends ServiceProvider
{
    /** Identifier for the service */
    const IDENTIFIER = 'laravel-slider-pro';

    /**
     * Register bindings in the container.
     * @return void
     */
    public function register()
    {
        $this->app->bind(self::IDENTIFIER, function ($app) {
            return $app->make(SliderPro::class);
        });
    }

    /**
     * Bootstrap any application services.
     * @return void
     */
    public function boot()
    {
        // specify from where we want to load the views
        $this->loadViewsFrom(__DIR__ . '/views/', 'slider-pro');

        // publish all the required files to generate the slider
        $this->publishes([
            // css
            __DIR__ . '/../../../npm-asset/slider-pro/dist/css/slider-pro.css'        => public_path('css/slider-pro.css'),
            // css images
            __DIR__ . '/../../../npm-asset/slider-pro/dist/css/images/closedhand.cur' => public_path('css/images/closedhand.cur'),
            __DIR__ . '/../../../npm-asset/slider-pro/dist/css/images/openhand.cur'   => public_path('css/images/openhand.cur'),
            // js
            __DIR__ . '/../../../npm-asset/slider-pro/dist/js/jquery.sliderPro.js'    => public_path('js/slider-pro.js'),
        ], 'slider-pro');
    }

    /**
     * @return array
     */
    public function provides()
    {
        return [self::IDENTIFIER];
    }
}