<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Message */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="message-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'msg_from')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'msg_to')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'msg_subject')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'msg_body')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'msg_status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
