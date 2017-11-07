YII2 Image Cropper
==================
YII2 Image Cropper
More details on http://odyniec.net/projects/imgareaselect/usage.html

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