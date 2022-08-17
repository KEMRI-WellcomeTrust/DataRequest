<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\widgets\Select2;
use kartik\widgets\TimePicker;
use kartik\date\DatePicker;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\Progress */
/* @var $form yii\widgets\ActiveForm */
?>

<?php   $id = isset($model->id)?$model->id:0; ?>
<div class="progress-form" id="progress-form-div-<?= $id ?>">
    <?php  $form = ActiveForm::begin(['id'=>'progress-form-'.$id]); ?>
     <div id="progress-form-alert-<?= $id ?>"></div>

     <?= "<h3> Analysis Progress </h3>"; ?>

    <?= $form->field($model, 'fk_project')->hiddenInput()->label("") ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?php
    $hint = "Progress Date";
    echo $form->field($model, 'progress_date')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'From:', 'title' => $hint, 'data-toggle' => 'tooltip'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd'
        ]
    ])->hint($hint);   ?>

    <?= $form->field($model, 'stage')->widget(Select2::classname(), [
            'data' => \app\models\Lookup::getLookupValues('Stage'),
            'options' => ['placeholder' => 'Please Select ...', 'multiple' => false, 'style'=>'width:250px', 'title' => "Select a milestone stage",'data-toggle' => 'tooltip'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->hint("Select a milestone stage"); 
    ?>

    <?= $form->field($model, 'progress_desc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'challenges')->textarea(['rows' => 6]) ?>

    <?php
    $hint = "File Attachments (e.g. SAP, Manuscript, Presentations or Papers)"; 
    echo $form->field($model, 'attach_file')->fileInput()->hint($hint); ?>
    <?php $upload_url =  Url::to(['progress/upload']); ?>
    <?= Html::submitButton("Upload File", ['class' =>'btn btn-danger btn-create','onclick'=>" uploadFile('$upload_url','upload_div', 'progress-attach_file','progress-file_url'); return false;"]); ?>
    
    <?= $form->field($model, 'file_url')->hiddenInput() ?>

    <div id="upload_div">
    </div>

    <?php # echo $form->field($model, 'submitted_by')->textInput() ?>
    <?= $form->field($model, 'attach_file')->hiddenInput()->label("") ?>

    <div class="form-group">
        <?php 
        if($model->isNewRecord){
            $url =  Url::to(['progress/create', 'project_id'=> $model->fk_project]); 
        }
        else{
            $url =  Url::to(['progress/update', 'id'=>$model->id]); 
        }
        
        ?>
        <?= Html::submitButton('Submit', ['class' =>'btn btn-success btn-create','onclick'=>"ajaxFormSubmit('$url','progress-form-div-$id','progress-form-$id',1); return false;"]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
