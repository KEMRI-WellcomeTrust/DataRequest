<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>
<?php   $id = isset($model->id)?$model->id:0; ?>
<div class="user-form" id="user-form-div-<?= $id ?>">
    <?php  $form = ActiveForm::begin(['id'=>'user-form-'.$id]); ?>
     <div id="user-form-alert-<?= $id ?>"></div>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true])->label("Username (account name)")->hint("Enter Username") ?>

    <?= $form->field($model, 'fname')->textInput(['maxlength' => true])->hint("First Name") ?>

    <?= $form->field($model, 'mname')->textInput(['maxlength' => true])->hint("Middle Name (optional)") ?>

    <?= $form->field($model, 'lname')->textInput(['maxlength' => true])->hint("Last Name") ?>
     
    <?= $form->field($model, 'email')->textInput(['maxlength' => true])->hint("Email Address") ?>


    <?php  // Usage with ActiveForm and model
    echo $form->field($model, 'fk_site')->widget(Select2::classname(), [
        'data' => \app\models\ChainSites::getSiteOptions(),
        'options' => ['placeholder' => 'Please Select ...'],
        'pluginOptions' => [
            'allowClear' => true,
            'style'=>'width:200px'
        ],
     ]); 
   ?>
    <?php  // Usage with ActiveForm and model
      #  echo $form->field($model, 'designation')->widget(Select2::classname(), [
      #      'data' => \app\models\Lookup::getLookupValues('Staff Designation'),
      #      'options' => ['placeholder' => 'Please Select ...'],
      #      'pluginOptions' => [
      #          'allowClear' => true,
      #          'style'=>'width:250px'
      #      ],
      #  ]); 
        ?>

    <?= $form->field($model, 'color')->textInput(['maxlength' => true, 'type'=>'color']) ?>
    <?= $form->field($model, 'role')->hiddenInput()->label("") ?>
    <div class="form-group">
        <?php if($model->isNewRecord){ $url =  Url::to(['user/create']); }else { $url =  Url::to(['user/update','id'=>$model->id]); } ?>
        <?= Html::submitButton('Submit', ['class' =>'btn btn-success btn-create','onclick'=>"ajaxFormSubmit('$url','user-form-div-$id','user-form-$id',1); return false;"]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
