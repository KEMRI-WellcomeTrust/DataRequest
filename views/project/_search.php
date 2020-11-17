<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'project_name') ?>

    <?= $form->field($model, 'project_desc') ?>

    <?= $form->field($model, 'project_aims') ?>

    <?= $form->field($model, 'request_type') ?>

    <?php // echo $form->field($model, 'type_data') ?>

    <?php // echo $form->field($model, 'proposal_type') ?>

    <?php // echo $form->field($model, 'date_submitted') ?>

    <?php // echo $form->field($model, 'date_review') ?>

    <?php // echo $form->field($model, 'irb_other_approval') ?>

    <?php // echo $form->field($model, 'sap') ?>

    <?php // echo $form->field($model, 'pub_plan') ?>

    <?php // echo $form->field($model, 'target_completion_date') ?>

    <?php // echo $form->field($model, 'milestones') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'request_status') ?>

    <?php // echo $form->field($model, 'request_approved_by') ?>

    <?php // echo $form->field($model, 'request_reviewed_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
