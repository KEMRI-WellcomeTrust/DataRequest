<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Beneficiary */
/* @var $form yii\widgets\ActiveForm */
use kartik\select2\Select2;
use yii\helpers\Url;
?>
<?php   $id = isset($model->id)?$model->id:0; $keyword = "projectstaff"; ?>
<div class="<?= $keyword ?>-form" id="<?= $keyword ?>-form-div-<?= $id ?>">
    <?php  $form = ActiveForm::begin(['id'=> $keyword.'-form-'.$id]); ?>
     <div id="<?= $keyword ?>-form-alert-<?= $id ?>"></div>
    
    <?= $form->field($model, 'data_entry_staff')->textInput(['maxlength' => true]) ?>

     <?php  // Usage with ActiveForm and model
        echo $form->field($model, 'data_entry_staff_designation')->widget(Select2::classname(), [
            'data' => \app\models\Lookup::getLookupValues('Staff Designation'),
            'options' => ['placeholder' => 'Please Select ...'],
            'pluginOptions' => [
                'allowClear' => true,
                'style'=>'width:250px'
            ],
        ]); 
        ?>
    
<div class="form-group">
         <?php $url =  Url::to(['beneficiary/update','id'=>$model->id, 'keyword'=>$keyword]); ?>
        <?= Html::submitButton('Save', ['class' =>'btn btn-success btn-create','onclick'=>"ajaxFormSubmit('$url','$keyword-form-div-$id','$keyword-form-$id',1); return false;"]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>