<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProgressSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="progress-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'fk_project') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'progress_date') ?>

    <?= $form->field($model, 'stage') ?>

    <?php // echo $form->field($model, 'attach_file') ?>

    <?php // echo $form->field($model, 'progress_desc') ?>

    <?php // echo $form->field($model, 'challenges') ?>

    <?php // echo $form->field($model, 'submitted_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
