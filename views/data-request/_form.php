<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DataRequest */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="data-request-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'project_id')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'data_crfs')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'data_variables')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'data_sites')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_from')->textInput() ?>

    <?= $form->field($model, 'date_to')->textInput() ?>

    <?= $form->field($model, 'other_info')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'received_date')->textInput() ?>

    <?= $form->field($model, 'reviewed_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'approved_by')->textInput() ?>

    <?= $form->field($model, 'approved_date')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'status_comments')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'feedback')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
