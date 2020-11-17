<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Beneficiary */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="beneficiary-form">

        <?php   $id = isset($model->id)?$model->id:0; $keyword = "customdelete"; ?>
        <div class="<?= $keyword ?>-form" id="<?= $keyword ?>-form-div-id">
        <?php  $form = ActiveForm::begin(['id'=> $keyword.'-form-id']); ?>
        <div id="<?= $keyword ?>-form-alert-id"></div>

    <?php  // Usage with ActiveForm and model
        echo $form->field($model, 'flag_delete')->widget(Select2::classname(), [
            'data' => \app\models\Lookup::getLookupValues('FLAG DELETE'),
            'options' => ['placeholder' => 'Please Select ...'],
            'pluginOptions' => [
                'allowClear' => true,
                'style'=>'width:250px'
            ],
        ]); 
    ?>
    <div class="form-group">
         <?php $url =  Url::to(['beneficiary/customdelete','id'=>$model->id]); ?>
        <?= Html::submitButton('Save', ['class' =>'btn btn-success btn-create','onclick'=>"ajaxFormSubmit('$url','customdelete-form-div-id','customdelete-form-id',1,0); return false;"]);  ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>