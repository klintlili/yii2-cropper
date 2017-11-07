YII2 Image Cropper
==================
YII2 Image Cropper. Extension based on imgAreaSelect jQuery plugin.
More details about it on author site http://odyniec.net/projects/imgareaselect/usage.html

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require --prefer-dist stkevich/yii2-cropper "*"
```

or add

```
"stkevich/yii2-cropper": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by:

```php
use \stkevich\cropper\Cropper;
...
$form->field($modelName, 'fieldName')->widget(Cropper::className(), []);

```

You can add some options to widget:
```php
$form->field($modelName, 'fieldName')->widget(Cropper::className(), 
    [
        'aspectRatio' => '1', //A string of the form "width:height" which represents the aspect ratio to maintain. Default = 1.
        'maxHeight' => '200', //Maximum selection height (in pixels). Default = 9999.
        'maxWidth' => '200', //Maximum selection width (in pixels). Default = 9999.
        'minHeight' => '200', //Minimum selection height (in pixels). Default = 0.
        'minWidth' => '200', //Minimum selection width (in pixels). Default = 0.
        'resizable' => 'true', //If set to true, the plugin is completely removed. Default = true.
    ]
);
```