<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\web\View;
use kartik\widgets\Select2;
use kartik\widgets\TimePicker;
use kartik\date\DatePicker;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\Project */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
$this->registerCssFile(\Yii::$app->request->BaseUrl."/css/select2.min.css", [
    'depends' => [],
    'media' => 'print',
], 'css-print-theme');
?>
<?php   $id = isset($model->id)?$model->id:0; ?>
<div class="data-request-form" id="data-request-form-div-<?= $id ?>">
    <?php  $form = ActiveForm::begin(['id'=>'data-request-form-'.$id]); ?>
     <div id="data-request-form-alert-<?= $id ?>"></div>

    <?= $form->field($model, 'review_comments')->textarea(['rows' => 3, 'value' => ""]) ?>

<div class="form-group">
        <?php 
            $url =  Url::to(['data-request/review', 'id'=>$model->id]); 
        ?>
        <?= Html::submitButton('Submit Review', ['class' =>'btn btn-success','onclick'=>"ajaxFormSubmit('$url','data-request-form-div-$id','data-request-form-$id',1); return false;"]) ?>
    </div>
 
    <?php ActiveForm::end(); ?>

</div>
