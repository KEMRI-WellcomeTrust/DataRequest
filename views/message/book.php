<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\TimePicker;
use kartik\date\DatePicker;
use yii\helpers\Url;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model app\models\Message */
/* @var $form yii\widgets\ActiveForm */
?>

<?php   $id = isset($model->id)?$model->id:0; ?>
<div class="message-form" id="message-form-div-<?= $id ?>">
    <?php  $form = ActiveForm::begin(['id'=>'message-form-'.$id]); ?>
     <div id="message-form-alert-<?= $id ?>"></div>

    <?php
        $hint = "Suggested Date of meeting";
        echo $form->field($model, 'msg_to')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Enter date...', 'title' => $hint,'data-toggle' => 'tooltip'],
            'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy-mm-dd'
            ]
        ])->hint($hint)->label("Date of Meeting");   
    ?>
    <?php 
      $hint = "hh:mm";
      echo $form->field($model, 'msg_from')->widget(TimePicker::classname(), [
            'options' => ['placeholder' => 'Enter Time...', 'title' => $hint,'data-toggle' => 'tooltip'],
            'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy-mm-dd'
            ]
        ])->hint($hint)->label("Suggest Time"); ?>

    <?= $form->field($model, 'msg_subject')->textInput(['maxlength' => true])->label("Subject") ?>

    <?= $form->field($model, 'project_id')->hiddenInput()->label("") ?>

    <?= $form->field($model, 'msg_body')->textarea(['rows' => 6])->label("Body") ?>

        <div class="form-group">
        <?php 
            $url =  Url::to(['message/book']); 
        ?>
        <?= Html::submitButton('Send', ['class' =>'btn btn-success pull-right','onclick'=>"ajaxFormSubmit('$url','message-form-div-$id','message-form-$id',1); return false;"]) ?>
    </div>
 
    <?php ActiveForm::end(); ?>

</div>