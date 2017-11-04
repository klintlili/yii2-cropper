<?php
use \stkevich\cropper\CropperAssets;
use \yii\helpers\Html;

CropperAssets::register($this);

/* @var $source string */
/* @var $nameForm string */
/* @var $nameFormInfo string */
/* @var $imageId string */
/* @var $formId string */
/* @var $options mixed */
?>

<div class="admin_thumbnail">
    <img src="<?=$source;?>" id="<?=$imageId;?>"/>
</div>

<?= Html::fileInput($nameForm, '', ['id'=>$formId, 'accept'=>"image/jpeg,image/png,image/gif"]);?>

<?= Html::hiddenInput($nameFormInfo . "[x1]", '0', ['id'=>"$formId-x1"]);?>
<?= Html::hiddenInput($nameFormInfo . "[y1]", '0', ['id'=>"$formId-y1"]);?>
<?= Html::hiddenInput($nameFormInfo . "[x2]", '0', ['id'=>"$formId-x2"]);?>
<?= Html::hiddenInput($nameFormInfo . "[y2]", '0', ['id'=>"$formId-y2"]);?>
<?= Html::hiddenInput($nameFormInfo . "[width]", '0', ['id'=>"$formId-width"]);?>
<?= Html::hiddenInput($nameFormInfo . "[height]", '0', ['id'=>"$formId-height"]);?>
<?= Html::hiddenInput($nameFormInfo . "[browseWidth]", '0', ['id'=>"$formId-img-width"]);?>
<?= Html::hiddenInput($nameFormInfo . "[browseHeight]", '0', ['id'=>"$formId-img-height"]);?>

<?php
$this->registerJs("
        $( '#$formId' ).change(function(event) {
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
                               $('#$formId-x1').val(selection.x1);
                               $('#$formId-y1').val(selection.y1);
                               $('#$formId-x2').val(selection.x2);
                               $('#$formId-y2').val(selection.y2);
                               $('#$formId-width').val(selection.width);
                               $('#$formId-height').val(selection.height);
                               $('#$formId-img-width').val($('#$imageId').width());
                               $('#$formId-img-height').val($('#$imageId').height());
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
