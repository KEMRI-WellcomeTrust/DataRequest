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

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lname')->textInput(['maxlength' => true]) ?>
     
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
     
    <?php  // Usage with ActiveForm and model
   echo $form->field($model, 'org_id')->widget(Select2::classname(), [
       'data' => \app\models\Lookup::getLookupValues('Organization Name'),
       'options' => ['placeholder' => 'Please Select ...'],
       'pluginOptions' => [
           'allowClear' => true,
           'style'=>'width:200px'
       ],
   ]); 
   ?>
     
    <?php  // Usage with ActiveForm and model
        echo $form->field($model, 'designation')->widget(Select2::classname(), [
            'data' => \app\models\Lookup::getLookupValues('Staff Designation'),
            'options' => ['placeholder' => 'Please Select ...'],
            'pluginOptions' => [
                'allowClear' => true,
                'style'=>'width:250px'
            ],
        ]); 
        ?>
  <?php  // Usage with ActiveForm and model
        echo $form->field($model, 'role')->widget(Select2::classname(), [
            'data' => \app\models\Lookup::getLookupValues('Role'),
            'options' => ['placeholder' => 'Please Select ...'],
            'pluginOptions' => [
                'allowClear' => true,
                'style'=>'width:250px'
            ],
        ]); 
        ?>
    <div class="form-group">
        <?php if($model->isNewRecord){ $url =  Url::to(['user/create']); }else { $url =  Url::to(['user/update','id'=>$model->id]); } ?>
        <?= Html::submitButton('Submit', ['class' =>'btn btn-success btn-create','onclick'=>"ajaxFormSubmit('$url','user-form-div-$id','user-form-$id',1); return false;"]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
