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
     $hint = "Title";
    echo $form->field($model, 'project_name')->textInput(['maxlength' => true,
                'title' => $hint,
                'data-toggle' => 'tooltip'
                ])->hint($hint)
    ?>

    <?php  // Usage with ActiveForm and model
        $hint = "Initial Proposer";
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
        $hint = "Proposer E-mail";
        echo $form->field($model, 'proposer_email')->textInput(['maxlength' => true,
                'title' => $hint,
                'data-toggle' => 'tooltip'
                ])->hint($hint);
    ?>

    <?php  // Usage with ActiveForm and model
        $hint = "CHAIN members and others involved up to now (if applicable)";
        echo $form->field($model, 'members_involved')->textInput(['maxlength' => true,
        'title' => $hint,
        'data-toggle' => 'tooltip'
        ])->hint($hint);
    ?>

    <?php 
        $hint = "Date Submitted";
        echo $form->field($model, 'date_submitted')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Enter date of submission...', 'title' => $hint,'data-toggle' => 'tooltip'],
            'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy-mm-dd'
            ]
        ])->hint($hint);   
    ?>

    <?php 
        $hint = "General Problem (max 200 words):  Briefly, what is the health problem and knowledge gap this work aims to address?)";
        echo $form->field($model, 'general_problem')->widget(CKEditor::className(), [
            'options' => ['rows' => 3, 'title' => $hint,'data-toggle' => 'tooltip'],
            'preset' => 'full'
        ])->hint($hint) 
    ?>

    <?php 
        $hint = "The key objectives you want to achieve in this analysis.";
        echo $form->field($model, 'project_aims')->widget(CKEditor::className(), [
            'options' => ['rows' => 3, 'title' => $hint,'data-toggle' => 'tooltip'],
            'preset' => 'full'
        ])->hint($hint); 
    ?>

    <?php  // Usage with ActiveForm and model
        $hint = "Type of concept";
        echo $form->field($model, 'proposal_type')->widget(Select2::classname(), [
            'data' => \app\models\Lookup::getLookupValues('ProposalType'),
            'options' => ['placeholder' => 'Please Select ...', 'multiple' => false, 'style'=>'width:250px', 'title' => $hint,'data-toggle' => 'tooltip'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->hint($hint); 
    ?>
    
    <?= $form->field($model, 'stage')->widget(Select2::classname(), [
            'data' => \app\models\Lookup::getLookupValues('Stage'),
            'options' => ['placeholder' => 'Please Select ...', 'multiple' => false, 'style'=>'width:250px', 'title' => "Select a milestone stage",'data-toggle' => 'tooltip'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->hint("Select a milestone stage"); 
    ?>

    <?php
        $hint = "What is the anticipated timeline?";
        echo $form->field($model, 'milestones')->widget(CKEditor::className(), [
            'options' => ['rows' => 1, 'title' => $hint,'data-toggle' => 'tooltip'],
            'preset' => 'full'
        ])->hint($hint); 
    ?>

    <?php

        $hint = "What are the intended outputs (grant application, publication, policy statement, etc)?";
        echo $form->field($model, 'pub_plan')->widget(CKEditor::className(), [
            'options' => ['rows' => 3, 'title' => $hint,'data-toggle' => 'tooltip'],
            'preset' => 'full'
	    ])->hint($hint); 
    ?>

    <?php 
        $hint = "When will the concept be finalized?";
        echo $form->field($model, 'est_concept_date')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Concept Date', 'title' => $hint,'data-toggle' => 'tooltip'],
            'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy-mm-dd'
            ]
        ])->hint($hint);   
    ?>

    <?php 
        $hint = "When will the SAP be ready?";
        echo $form->field($model, 'est_sap_date')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'SAP Date', 'title' => $hint,'data-toggle' => 'tooltip'],
            'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy-mm-dd'
            ]
        ])->hint($hint);   
    ?>

    <?php 
        $hint = "When will you finish analysis?";
        echo $form->field($model, 'est_analysis_date')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Analysis Date', 'title' => $hint,'data-toggle' => 'tooltip'],
            'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy-mm-dd'
            ]
        ])->hint($hint);   
    ?>
    <?php 
        $hint = "When will the manuscript be ready?";
        echo $form->field($model, 'est_manuscript_date')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Manuscript Date', 'title' => $hint,'data-toggle' => 'tooltip'],
            'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy-mm-dd'
            ]
        ])->hint($hint);   
    ?>
    <?php 
        $hint = "When do you think the final publication will be ready";
        echo $form->field($model, 'est_pub_date')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Publication Date', 'title' => $hint,'data-toggle' => 'tooltip'],
            'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy-mm-dd'
            ]
        ])->hint($hint);   
    ?>



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
