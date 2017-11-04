<?php
//http://odyniec.net/projects/imgareaselect/usage.html
namespace stkevich\cropper;

use Yii;

/**
 * Widget for cropping image to yii2.
 *
 * @author Stas Kevich <st.kevich@gmail.com>
 */
class Cropper extends \yii\bootstrap\Widget
{
    /**
     * @var \yii\db\ActiveRecord
     */
    public $model;

    /**
     * @var string
     */
    public $attribute;

    /**
     *  OPTIONS BEGIN
     */

    /**
     * A string of the form "width:height" which represents the aspect ratio to maintain.
     * Example: "4:3"
     * @var string
     */
    public $aspectRatio = '1';

    /**
     * If set to true, selection area will disappear when selection ends.
     * Default: false
     * @var string
     */
    public $autoHide = 'false';

    /**
     * Maximum selection height (in pixels)
     * @var integer
     */
    public $maxHeight = '9999';

    /**
     * Maximum selection width (in pixels)
     * @var integer
     */
    public $maxWidth = '9999';

    /**
     * Minimum selection height (in pixels)
     * @var integer
     */
    public $minHeight = '0';

    /**
     * Minimum selection width (in pixels)
     * @var integer
     */
    public $minWidth = '0';

    /**
     * If set to true, the plugin is completely removed
     * @var boolean
     */
    public $resizable = 'true';

    /**
     * OPTIONS END
     */


    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $attribute = $this->attribute;
        return $this->render(
            'view',
            [
                'model' => $this->model,
                'source' => $this->model->$attribute,
                'nameForm' => $this->getName($attribute),
                'nameFormInfo' => $this->getNameInfo($attribute),
                'imageId' => $this->getIdName($attribute, 'image'),
                'formId' => $this->getIdName($attribute, 'form'),
                'options' => [
                    'aspectRatio' => $this->aspectRatio,
                    'autoHide' => $this->autoHide,
                    'maxHeight' => $this->maxHeight,
                    'maxWidth' => $this->maxWidth,
                    'minHeight' => $this->minHeight,
                    'minWidth' => $this->minWidth,
                    'resizable' => $this->resizable,
                ]
            ]
        );
    }

    private function getName($attribute, $prefix='', $suffix='')
    {
        $formName = $this->model->formName();
        $name = $formName . $prefix . "[$attribute]" . $suffix;
        return $name;
    }

    private function getNameInfo($attribute, $prefix='', $suffix='')
    {
        $formName = $this->model->formName();
        $name = $formName . $prefix . "[$attribute"."Info]" . $suffix;
        return $name;
    }

    private function getIdName($attribute, $prefix='', $suffix='')
    {
        $formName = $this->model->formName();
        $idName = "$formName$prefix$attribute$suffix";
        return $idName;
    }
}
