<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\web\View;
use kartik\widgets\Select2;
use kartik\widgets\TimePicker;
use kartik\date\DatePicker;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\Project */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
$this->registerCssFile(\Yii::$app->request->BaseUrl."/css/select2.min.css", [
    'depends' => [],
    'media' => 'print',
], 'css-print-theme');
?>
<?php   $id = isset($model->id)?$model->id:0; ?>
<div class="project-form" id="project-form-div-<?= $id ?>">
    <?php  $form = ActiveForm::begin(['id'=>'project-form-'.$id, 'options' => ['enctype' => 'multipart/form-data']]); ?>
     <div id="project-form-alert-<?= $id ?>"></div>

    <?php
     $hint = "Name of the analysis project to be undertaken.";
    echo $form->field($model, 'project_name')->textInput(['maxlength' => true,
                'title' => $hint,
                'data-toggle' => 'tooltip'
                ])->hint($hint)
    ?>

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
    $hint = "The key objectives you want to achieve in this analysis.";
    echo $form->field($model, 'project_aims')->widget(CKEditor::className(), [
		'options' => ['rows' => 3, 'title' => $hint,'data-toggle' => 'tooltip'],
		'preset' => 'full'
	])->hint($hint) ?>

    <?php  // Usage with ActiveForm and model
        $hint = "Specify source of data if known.";
        echo $form->field($model, 'type_data')->widget(Select2::classname(), [
            'data' => \app\models\Lookup::getLookupValues('TypeData'),
            'options' => ['placeholder' => 'Please Select ...', 'style'=>'width:250px', 'title' => $hint,'data-toggle' => 'tooltip'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->hint($hint); 
    ?>

    <?php  // Usage with ActiveForm and model
        $hint = "Nature of work related to this proposal";
        echo $form->field($model, 'proposal_type')->widget(Select2::classname(), [
            'data' => \app\models\Lookup::getLookupValues('ProposalType'),
            'options' => ['placeholder' => 'Please Select ...', 'style'=>'width:250px', 'title' => $hint,'data-toggle' => 'tooltip'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->hint($hint); 
    ?>

    <?php 
    $hint = "Date of this request.";
    echo $form->field($model, 'date_submitted')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter date of submission...', 'title' => $hint,'data-toggle' => 'tooltip'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd'
        ]
    ])->hint($hint);   ?>

    <?php  
       $hint = "IRB or other regulatory approval required/provided";
        echo $form->field($model, 'irb_other_approval')->widget(Select2::classname(), [
            'data' => \app\models\Lookup::getLookupValues('IrbApproval'),
            'options' => ['placeholder' => 'Please Select ...', 'style'=>'width:250px', 'title' => $hint,'data-toggle' => 'tooltip'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->hint($hint); 
    ?>

    <?php
    $hint = "Statistical Analysis Plan"; 
    echo $form->field($model, 'sap')->fileInput()->hint($hint); ?>
    <?php $upload_url =  Url::to(['project/upload']); ?>
    <?= Html::submitButton("Upload File", ['class' =>'btn btn-danger btn-create','onclick'=>" uploadFile('$upload_url','upload_div', 'project-sap','project-file_url'); return false;"]); ?>
    
    <?= $form->field($model, 'file_url')->hiddenInput() ?>

    <div id="upload_div">
    </div>

    <?php
    $hint = "Plans for publication, which journal, when?";
    echo $form->field($model, 'pub_plan')->widget(CKEditor::className(), [
		'options' => ['rows' => 3, 'title' => $hint,'data-toggle' => 'tooltip'],
		'preset' => 'full'
	])->hint($hint); ?>

    <?php 
    $hint = "Target completion date for this analysis";
    echo $form->field($model, 'target_completion_date')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Target Completion Date', 'title' => $hint,'data-toggle' => 'tooltip'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd'
        ]
    ])->hint($hint);   ?>

    <?php
    $hint = "Key milestones";
    echo $form->field($model, 'milestones')->widget(CKEditor::className(), [
		'options' => ['rows' => 1, 'title' => $hint,'data-toggle' => 'tooltip'],
		'preset' => 'full'
	])->hint($hint); ?>


    <div class="form-group">
        <?php 
        if($model->isNewRecord){
            $url =  Url::to(['project/create']); 
        }
        else{
            $url =  Url::to(['project/update', 'id'=>$model->id]); 
        }
        
        ?>
        <?= Html::submitButton('Next', ['class' =>'btn btn-success btn-create','onclick'=>"ajaxFormSubmit('$url','project-form-div-$id','project-form-$id',1); return false;"]) ?>
    </div>
 
    <?php ActiveForm::end(); ?>

</div>
