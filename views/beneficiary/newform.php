<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\web\View;
use kartik\widgets\Select2;
//use kartik\widgets\DatePicker;
use kartik\widgets\TimePicker;
use kartik\date\DatePicker;


/* @var $this yii\web\View */
/* @var $model app\models\Beneficiary */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
$this->registerCssFile(\Yii::$app->request->BaseUrl."/css/select2.min.css", [
    'depends' => [],
    'media' => 'print',
], 'css-print-theme');
?>
<?php   $id = isset($model->id)?$model->id:0; ?>
<div class="beneficiary-form" id="beneficiary-form-div-<?= $id ?>">
    <h1><?= Html::encode($title) ?></h1>
    <?php  $form = ActiveForm::begin(['id'=>'beneficiary-form-'.$id]); ?>
     <div id="beneficiary-form-alert-<?= $id ?>"></div>

    <?= $form->field($model, 'fname')->textInput() ?>

    <?= $form->field($model, 'mname')->textInput() ?>

    <?= $form->field($model, 'lname')->textInput() ?>

    <?php echo $form->field($model, 'date_intake')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter intake date ...'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);   ?>

    <?= $form->field($model, 'unique_id')->textInput() ?>

     <div class="form-group">
        <?php $url =  Url::to(['beneficiary/create']);  ?>
        <?= Html::submitButton('Add Beneficiary', ['class' =>'btn btn-success btn-create','onclick'=>"ajaxFormSubmit('$url','beneficiary-form-div-$id','beneficiary-form-$id',1); return false;"]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
