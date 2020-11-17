<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\ChainUsers */
/* @var $form yii\widgets\ActiveForm */
?>

<?php 

        $view_name = 'user';
        $id = isset($model->id)?$model->id:0;
        echo <<<EOD
        <div class="$view_name-form" id="$view_name-form-div-$id">
              <div id="$view_name-form-alert-$id"></div>
EOD;
        $form = ActiveForm::begin(['id'=>"$view_name-form-$id"]);
?>
    <h3> Reset Your Password </h3>
    <?= $form->field($model, 'passwd')->passwordInput(['maxlength' => true])->label("Enter Password") ?>

    <?= $form->field($model, 'confirmpass')->passwordInput()->label("Confirm Password") ?>
    
    <?= $form->field($model, 'checkpass')->hiddenInput()->label("") ?>

     <?= $form->field($model, 'emailpass')->checkBox() ?>
   <div class="form-group">
        <?php $url =  Url::to(["$view_name/setpass",'id'=>$model->id]);  ?>
        <?= Html::submitButton('Update', ['class' =>'btn btn-danger btn-success','onclick'=>"ajaxFormSubmit('$url','$view_name-form-div-$id','$view_name-form-$id',1); return false;"]) ?>
    </div><div style="clear:both"></div>

    <?php ActiveForm::end(); ?>

</div>
<style type="text/css">
 .user-form {
    margin-top: 100px;
    width: 400px;
    margin-left: auto;
    margin-right: auto;
 }
</style>
