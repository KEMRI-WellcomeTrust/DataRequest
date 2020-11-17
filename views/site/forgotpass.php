<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = '';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login container" id="forgotpass-form-div">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please enter your email address to generate a password reset link:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'forgotpass-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'email')->textInput(['autofocus' => true,"label"=>"Enter your email address."]) ?>


        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
            <?php $url =  Url::to(['site/forgotpass']); ?>
            <?= Html::submitButton('Save', ['class' =>'btn btn-success btn-create','onclick'=>"ajaxFormSubmit('$url','forgotpass-form-div','forgotpass-form',1,1); return false;"]);  ?>
            </div>

        </div>

    <?php ActiveForm::end(); ?>

</div>
