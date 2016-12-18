# Laravel slider-pro widget

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

To install, either run

```
$ php composer.phar require edofre/laravel-slider-pro "*"
```

or add

```
"edofre/laravel-slider-pro": "*"
```

to the ```require``` section of your `composer.json` file.

## Usage 

Not all available modules are available as objects, these will be implemented at a later date, 
if you need exact/precise control please use the second method of creating the slider.

The following 2 ways are available to instantiate the slider:

### 1. You can use either the supplied php classes to generate the HTML

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
	new \edofre\sliderpro\models\Thumbnail(['tag' => 'img', 'htmlOptions' => ['src' => "/images/ttest.jpg", 'data-src' => "/images/test.jpg"]]),
	new \edofre\sliderpro\models\Thumbnail(['tag' => 'img', 'htmlOptions' => ['src' => "/images/ttest1.png", 'data-src' => "/images/test1.png"]]),
	new \edofre\sliderpro\models\Thumbnail(['tag' => 'img', 'htmlOptions' => ['src' => "/images/ttest2.png", 'data-src' => "/images/test2.png"]]),
	new \edofre\sliderpro\models\Thumbnail(['tag' => 'p', 'content' => 'Thumbnail for video']),
	new \edofre\sliderpro\models\Thumbnail(['tag' => 'p', 'content' => 'Thumbnail 5']),
];
?>

<?= \edofre\sliderpro\SliderPro::widget([
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
<?= \Edofre\SliderPro\SliderPro::generate([
	'id'            => 'my-slider',
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
```