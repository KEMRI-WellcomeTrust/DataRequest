<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\date\DatePicker;
use kartik\widgets\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\Followup */
/* @var $form yii\widgets\ActiveForm */
?>
<?php   $id = isset($model->id)?$model->id:0; ?>
<div class="followup-form" id="followup-form-div-<?= $id ?>">
    <?php  $form = ActiveForm::begin(['id'=>'followup-form-'.$id]); ?>
     <div id="followup-form-alert-<?= $id ?>"></div>

    <?= $form->field($model, 'fk_beneficiary')->hiddenInput()->label("") ?>

     <?php echo $form->field($model, 'followup_date')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter date ...'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);   ?>

     <?php  // Usage with ActiveForm and model
        echo $form->field($model, 'followup_outcome')->widget(Select2::classname(), [
            'data' => \app\models\Lookup::getLookupValues('Followup Outcome'),
            'options' => ['placeholder' => 'Please Select ...'],
            'pluginOptions' => [
                'allowClear' => true,
                'style'=>'width:250px'
            ],
        ]); 
        ?>

    <?= $form->field($model, 'followup_outcome_desc')->textarea(['rows' => 6]) ?>

     <div class="form-group">
        <?php if($model->isNewRecord){ $url =  Url::to(['followup/create']); }else { $url =  Url::to(['followup/update','id'=>$model->id]); } ?>
        <?= Html::submitButton('Save', ['class' =>'btn btn-success btn-create','onclick'=>"ajaxFormSubmit('$url','followup-form-div-$id','followup-form-$id',1); return false;"]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
