<?php
namespace stkevich\cropper;

use yii\web\AssetBundle;

/**
 * Register required JavaScript and CSS files
 *
 * @author Stas Kevich <st.kevich@gmail.com>
 */
class CropperAssets extends AssetBundle
{
    public $sourcePath = '@vendor/stkevich/cropper/assets';

    public $css = [
        'css/imgareaselect-default.css',
        'css/widget.css',
    ];

    public $js = [
        'js/jquery.imgareaselect.pack.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}