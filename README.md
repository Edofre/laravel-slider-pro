# Laravel slider-pro widget

[![Latest Stable Version](https://poser.pugx.org/edofre/laravel-slider-pro/v/stable)](https://packagist.org/packages/edofre/laravel-slider-pro)
[![Total Downloads](https://poser.pugx.org/edofre/laravel-slider-pro/downloads)](https://packagist.org/packages/edofre/laravel-slider-pro)
[![Latest Unstable Version](https://poser.pugx.org/edofre/laravel-slider-pro/v/unstable)](https://packagist.org/packages/edofre/laravel-slider-pro)
[![License](https://poser.pugx.org/edofre/laravel-slider-pro/license)](https://packagist.org/packages/edofre/laravel-slider-pro)
[![composer.lock](https://poser.pugx.org/edofre/laravel-slider-pro/composerlock)](https://packagist.org/packages/edofre/laravel-slider-pro)
[![Build Status](https://travis-ci.org/Edofre/laravel-slider-pro.svg?branch=master)](https://travis-ci.org/Edofre/laravel-slider-pro)

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

To install, either run

```
$ php composer.phar require edofre/laravel-slider-pro "v1.0.3"
```

or add

```
"edofre/laravel-slider-pro": "v1.0.3"
```

to the ```require``` section of your `composer.json` file.

### Note
The fxp/composer-asset plugin is required for this package to install properly.
This plugin enables you to download bower packages through composer.

You can install it using this command:
```
composer global require "fxp/composer-asset-plugin:^1.3.0”
```

This will add the fxp composer-asset-plugin and your composer will be able to find and download the required bower-asset/slider-pro package.
You can find more info on this page: [https://packagist.org/packages/fxp/composer-asset-plugin](https://packagist.org/packages/fxp/composer-asset-plugin).

## Configuration
Add the ServiceProvider to your config/app.php
```php
'providers' => [
        ...
        Edofre\SliderPro\SliderProServiceProvider::class,
    ],
```

And add the facade
```php
'aliases' => [
        ...
        'SliderPro' => Edofre\SliderPro\Facades\SliderPro::class,
    ],
```

### Publish assets
Publish the assets
```
php artisan vendor:publish --tag=slider-\pro
```

## Usage

Not all available modules are available as objects, these will be implemented at a later date,
if you need exact/precise control please use the second method of creating the slider.

The following 2 ways are available to instantiate the slider:

### 1. You can use either the supplied php classes to generate the HTML

#### WIP
```php
use Edofre\SliderPro\Models\Slide;
use Edofre\SliderPro\Models\Slides\Caption;
use Edofre\SliderPro\Models\Slides\Image;
use Edofre\SliderPro\Models\Slides\Layer;

$slides = [
	new Slide([
		'items' => [
			new Image(['src' => '/images/test.jpg']),
		],
	]),
	new Slide([
		'items' => [
			new Image(['src' => '/images/test1.png']),
			new Caption(['tag' => 'p', 'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.']),
		],
	]),
	new Slide([
		'items' => [
			new Image(['src' => '/images/test2.png']),
			new Layer(['tag' => 'h3', 'content' => 'Lorem ipsum dolor sit amet', 'htmlOptions' => ['class' => 'sp-black', 'data-position' => "bottomLeft", 'data-horizontal' => "10%", 'data-show-transition' => "left", 'data-show-delay' => "300", 'data-hide-transition' => "right"]]),
			new Layer(['tag' => 'p', 'content' => 'consectetur adipisicing elit', 'htmlOptions' => ['class' => 'sp-white sp-padding', 'data-width' => "200", 'data-horizontal' => "center", 'data-vertical' => "40%", 'data-show-transition' => "down", 'data-hide-transition' => "up"]]),
			new Layer(['tag' => 'div', 'content' => 'Static content', 'htmlOptions' => ['class' => 'sp-static']]),
		],
	]),
	new Slide([
		'content' =>
			'<a class="sp-video" href="http://vimeo.com/109354891">
				<img src="http://lorempixel.com/960/500/sports/5" width="500" height="300"/>
			</a>'
		,
	]),
	new Slide([
		'items' => [
			new Layer(['tag' => 'h3', 'content' => 'Lorem ipsum dolor sit amet']),
			new Layer(['tag' => 'p', 'content' => 'Consectetur adipisicing elit']),
		],
	]),
];

$thumbnails = [
	new \Edofre\SliderPro\Models\Thumbnail(['tag' => 'img', 'htmlOptions' => ['src' => "/images/ttest.jpg", 'data-src' => "/images/test.jpg"]]),
	new \Edofre\SliderPro\Models\Thumbnail(['tag' => 'img', 'htmlOptions' => ['src' => "/images/ttest1.png", 'data-src' => "/images/test1.png"]]),
	new \Edofre\SliderPro\Models\Thumbnail(['tag' => 'img', 'htmlOptions' => ['src' => "/images/ttest2.png", 'data-src' => "/images/test2.png"]]),
	new \Edofre\SliderPro\Models\Thumbnail(['tag' => 'p', 'content' => 'Thumbnail for video']),
	new \Edofre\SliderPro\Models\Thumbnail(['tag' => 'p', 'content' => 'Thumbnail 5']),
];
?>

<?= \Edofre\SliderPro\SliderPro::widget([
	'id'            => 'my-slider',
	'slides'        => $slides,
	'thumbnails'    => $thumbnails,
	'sliderOptions' => [
		'width'  => 960,
		'height' => 500,
		'arrows' => true,
		'init'   => new \yii\web\JsExpression("
			function() {
				console.log('slider is initialized');
			}
		"),
	],
]);
?>
```

### 2. Or you can create your own HTML code to generate the slider

```php
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
        ]
]);
?>

<div class="slider-pro" id="my-slider">
    <div class="sp-slides">
        <!-- Slide 1 -->
        <div class="sp-slide">
            <img class="sp-image" src="http://lorempixel.com/960/500/sports/1"/>
        </div>
        <!-- Slide 2 -->
        <div class="sp-slide">
            <img class="sp-image" src="http://lorempixel.com/960/500/sports/2"/>
            <p class="sp-caption">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        </div>
        <!-- Slide 3 -->
        <div class="sp-slide">
            <p>Lorem ipsum dolor sit amet</p>
        </div>
        <!-- Slide 4 -->
        <div class="sp-slide">
            <img class="sp-image" src="http://lorempixel.com/960/500/sports/3"/>
            <h3 class="sp-layer sp-black"
                data-position="bottomLeft" data-horizontal="10%"
                data-show-transition="left" data-show-delay="300" data-hide-transition="right">
                Lorem ipsum dolor sit amet
            </h3>
            <p class="sp-layer sp-white sp-padding"
               data-width="200" data-horizontal="center" data-vertical="40%"
               data-show-transition="down" data-hide-transition="up">
                consectetur adipisicing elit
            </p>
            <div class="sp-layer sp-static">Static content</div>
        </div>
        <!-- Slide 5 -->
        <div class="sp-slide">
            <h3 class="sp-layer">Lorem ipsum dolor sit amet</h3>
            <p class="sp-layer">consectetur adipisicing elit</p>
        </div>

        <!-- thumbnails -->
        <div class="sp-thumbnails">
            <img class="sp-thumbnail" src="http://lorempixel.com/960/500/sports/1" data-src="http://lorempixel.com/480/250/sports/1"/>
            <img class="sp-thumbnail" src="http://lorempixel.com/960/500/sports/2" data-src="http://lorempixel.com/480/250/sports/2"/>
            <img class="sp-thumbnail" src="http://lorempixel.com/960/500/sports/3" data-src="http://lorempixel.com/480/250/sports/3"/>
            <p class="sp-thumbnail">Thumbnail 4</p>
            <p class="sp-thumbnail">Thumbnail 5</p>
        </div>
    </div>
</div>
<?= $slider->generate(false); // Specify false so we don't generate a new <div> ?>
```

## Tests

Run the tests by executing the following command:
```
composer test
```