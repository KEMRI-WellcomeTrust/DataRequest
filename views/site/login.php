<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login container">
    <h1><?= Html::encode($this->title) ?></h1>

    <div id="message">
        <?= Yii::$app->session->getFlash('success');?>
    </div>

    <p>Please fill out the following fields to login:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
        ]) ?>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-2">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
            <div class="col-lg-offset-1 col-lg-2">
                <?php
                $dh = new \app\utilities\DataHelper();
                $url = yii\helpers\Url::to(['site/forgotpass', 'id'=>0],true);
                $link  = $dh->getModalButton(new \app\models\User, "site/forgotpass", "Forgot Password", 'btn btn-warning','Forgot Password',$url);
                echo $link;
                ?>
                
            </div>
            <div class="col-lg-offset-1 col-lg-2">
                <?php
                    $dh = new \app\utilities\DataHelper();
                    $url = yii\helpers\Url::to(['user/create', 'id'=>0]);
                    echo $dh->getModalButton(new \app\models\User(), "user/create", "Register for a user account on this portal", 'btn btn-info pull-right btn-beneficiary','New User? <br/> Click here to register',$url);
                ?>
                
            </div>
        </div>

    <?php ActiveForm::end(); ?>

</div>
