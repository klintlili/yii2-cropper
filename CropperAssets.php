<?php
/**
 * Created by PhpStorm.
 * User: st.kevich
 * Date: 07.11.17
 * Time: 11:59
 */
namespace stkevich\cropper;

use yii\web\AssetBundle;

/**
 * Register required JavaScript and CSS files
 *
 * @author Stas Kevich <st.kevich@gmail.com>
 */
class CropperAssets extends AssetBundle
{
    public $sourcePath = '@vendor/stkevich/yii2-cropper/assets';

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