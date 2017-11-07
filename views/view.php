<?php
/**
 * Created by PhpStorm.
 * User: st.kevich
 * Date: 07.11.17
 * Time: 11:59
 */
use \yii\helpers\Html;
use \stkevich\cropper\CropperAssets;

/**
 * @var $imageSrc string
 * @var $formName string
 * @var $formNameInfo string
 * @var $imageId string
 * @var $options mixed
 */

CropperAssets::register($this);

echo Html::beginTag('div', ['class'=>'admin_thumbnail']);
echo Html::img($imageSrc, ['id'=>$imageId]);
echo Html::endTag('div');

echo Html::fileInput($formName, '', ['id'=>$options['id'], 'accept'=>"image/jpeg,image/png,image/gif"]);
echo Html::hiddenInput($formNameInfo . "[x]", '0', ['id'=>"$options[id]-x"]);
echo Html::hiddenInput($formNameInfo . "[y]", '0', ['id'=>"$options[id]-y"]);
echo Html::hiddenInput($formNameInfo . "[width]", '0', ['id'=>"$options[id]-width"]);
echo Html::hiddenInput($formNameInfo . "[height]", '0', ['id'=>"$options[id]-height"]);

$this->registerJs("
    $( '#$options[id]' ).change(function(event) {
        var target = event.target || window.event.srcElement,
        files = target.files;
        
        if (FileReader && files && files.length) {
            var reader = new FileReader();
            reader.onload = function () {
               $('#$imageId').attr('src', reader.result);
               $('#$imageId').load(function(){
                   coefficient = $('#$imageId').width() / realImgSize(this).naturalWidth;
                   $('#$imageId').imgAreaSelect({
                       handles: true,
                       aspectRatio: '$options[aspectRatio]',
                       autoHide: $options[autoHide],
                       maxHeight: $options[maxHeight] * coefficient,
                       maxWidth: $options[maxWidth] * coefficient,
                       minHeight: $options[minHeight] * coefficient,
                       minWidth: $options[minWidth] * coefficient,
                       resizable: '$options[resizable]',
                       onSelectEnd: function (img, selection) {
                           $('#$options[id]-x').val(selection.x1 / coefficient);
                           $('#$options[id]-y').val(selection.y1 / coefficient);
                           $('#$options[id]-width').val(selection.width / coefficient);
                           $('#$options[id]-height').val(selection.height / coefficient);
                       }
                   });
               });
            }
            reader.readAsDataURL(files[0]);
        }
    });
    function realImgSize(img) {
        var i = new Image();
        i.src = img.src;
        return {
            naturalWidth: i.width, 
            naturalHeight: i.height
        };
    }
");
