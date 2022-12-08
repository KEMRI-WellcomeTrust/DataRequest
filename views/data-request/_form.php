<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use kartik\widgets\TimePicker;
use kartik\date\DatePicker;
use dosamigos\ckeditor\CKEditor;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\DataRequest */
/* @var $form yii\widgets\ActiveForm */
?>
 
<?php   $id = isset($model->id)?$model->id:0; ?>
<div class="data-request-form" id="data-request-form-div-<?= $id ?>">
    <?php  $form = ActiveForm::begin(['id'=>'data-request-form-'.$id]); ?>
     <div id="data-request-form-alert-<?= $id ?>"></div>
     
    <?= "<h3> Specify Data Request </h3>"; ?>
    <?= $form->field($model, 'project_id')->hiddenInput(['value'=> $model->project_id,'readonly'=>true])->label(false) ?>

    <?php  // Usage with ActiveForm and model
        $hint = "Main contact person for this request.";
        echo $form->field($model, 'user_id')->widget(Select2::classname(), [
            'data' => \app\models\User::getUserFilters(),
            'options' => ['placeholder' => 'Please Select ...', 'style'=>'width:250px', 'title' => $hint,
            'data-toggle' => 'tooltip'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->hint($hint); 
    ?>

    <?php 
        $hint = "List the CRFs from which you need data. https://chain.tghn.org/study_resources/";
        echo $form->field($model, 'data_crfs')->textarea(['rows'=>3, 'title' => $hint, 'data-toggle' => 'tooltip'])->hint($hint); 
    ?>

    <?php
      $hint = "List specific variables that you need. Please refer to our CRFs on https://chain.tghn.org/study_resources/";
      echo $form->field($model, 'data_variables')->textarea(['rows'=>3, 'title' => $hint, 'data-toggle' => 'tooltip'])->hint($hint); 
    ?>

    <?php
        $hint="List specific site(s) from which you need data.";
        echo $form->field($model, 'data_sites')->textInput(['maxlength' => true, 'title' => $hint, 'data-toggle' => 'tooltip'])->hint($hint); 
    ?>

    <?php 
    $hint = "Date filter start date";
    echo $form->field($model, 'date_from')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'From:', 'title' => $hint, 'data-toggle' => 'tooltip'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd'
        ]
    ])->hint($hint);   ?>

    <?php 
    $hint = "Date filter end date";
    echo $form->field($model, 'date_to')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'To:', 'title' => $hint, 'data-toggle' => 'tooltip'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd'
        ]
    ])->hint($hint);   ?>

    <?php 
    $hint = "Please provide justification for the variables selected.";
    echo $form->field($model, 'other_info')->widget(CKEditor::className(), [
		'options' => ['rows' => 3, 'title' => $hint, 'data-toggle' => 'tooltip'],
		'preset' => 'full'
	])->hint($hint); ?>

    <?php 
    $hint = "Date request was recieved";
    echo $form->field($model, 'received_date')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Date Recieved', 'title' => $hint, 'data-toggle' => 'tooltip'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd'
        ]
    ])->hint($hint);   ?>


    <div class="form-group">
        <?php 
        if($model->isNewRecord){
            $url =  Url::to(['data-request/create', 'project_id'=> $model->project_id]); 
        }
        else{
            $url =  Url::to(['data-request/update', 'id'=>$model->id]); 
        }
        
        ?>
        <?= Html::submitButton('Submit', ['class' =>'btn btn-success btn-create','onclick'=>"ajaxFormSubmit('$url','data-request-form-div-$id','data-request-form-$id',1); return false;"]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
