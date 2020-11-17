<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Beneficiary */
/* @var $form yii\widgets\ActiveForm */

use yii\helpers\Url;
use kartik\select2\Select2;
?>
<?php   $id = isset($model->id)?$model->id:0; $keyword = "finaloutcome"; ?>
<div class="<?= $keyword ?>-form" id="<?= $keyword ?>-form-div-<?= $id ?>">
    <?php  $form = ActiveForm::begin(['id'=> $keyword.'-form-'.$id]); ?>
     <div id="<?= $keyword ?>-form-alert-<?= $id ?>"></div>
    
     <?php  // Usage with ActiveForm and model
        echo $form->field($model, 'case_final_result')->widget(Select2::classname(), [
            'data' => \app\models\Lookup::getLookupValues('Final Result'),
            'options' => ['placeholder' => 'Please Select ...'],
            'pluginOptions' => [
                'allowClear' => true,
                'style'=>'width:250px'
            ],
        ]); 
        ?>

       <?php  // Usage with ActiveForm and model
        echo $form->field($model, 'cause_failure')->widget(Select2::classname(), [
            'data' => \app\models\Lookup::getLookupValues('Failure Cause'),
            'options' => ['placeholder' => 'Please Select ...'],
            'pluginOptions' => [
                'allowClear' => true,
                'style'=>'width:250px'
            ],
        ]); 
        ?>


    <?= $form->field($model, 'cause_failure_specify')->textInput(['maxlength' => true]) ?>

       <?php  // Usage with ActiveForm and model
        echo $form->field($model, 'cause_success')->widget(Select2::classname(), [
            'data' => \app\models\Lookup::getLookupValues('Success Cause'),
            'options' => ['placeholder' => 'Please Select ...'],
            'pluginOptions' => [
                'allowClear' => true,
                'style'=>'width:250px'
            ],
        ]); 
        ?>


    <?= $form->field($model, 'cause_success_specify')->textInput(['maxlength' => true]) ?>
    

<div class="form-group">
         <?php $url =  Url::to(['beneficiary/update','id'=>$model->id, 'keyword'=>$keyword]); ?>
        <?= Html::submitButton('Save', ['class' =>'btn btn-success btn-create','onclick'=>"ajaxFormSubmit('$url','$keyword-form-div-$id','$keyword-form-$id',1); return false;"]) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>