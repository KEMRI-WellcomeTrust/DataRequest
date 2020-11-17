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
    <?php  $form = ActiveForm::begin(['id'=>'project-form-'.$id]); ?>
     <div id="project-form-alert-<?= $id ?>"></div>

    <?= $form->field($model, 'project_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'project_desc')->widget(CKEditor::className(), [
		'options' => ['rows' => 3],
		'preset' => 'full'
	]) ?>

    <?= $form->field($model, 'project_aims')->widget(CKEditor::className(), [
		'options' => ['rows' => 3],
		'preset' => 'full'
	]) ?>

    <?php  // Usage with ActiveForm and model
        echo $form->field($model, 'request_type')->widget(Select2::classname(), [
            'data' => \app\models\Lookup::getLookupValues('RequestType'),
            'options' => ['placeholder' => 'Please Select ...', 'style'=>'width:250px'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); 
    ?>

    <?php  // Usage with ActiveForm and model
        echo $form->field($model, 'type_data')->widget(Select2::classname(), [
            'data' => \app\models\Lookup::getLookupValues('TypeData'),
            'options' => ['placeholder' => 'Please Select ...', 'style'=>'width:250px'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); 
    ?>

    <?php  // Usage with ActiveForm and model
        echo $form->field($model, 'proposal_type')->widget(Select2::classname(), [
            'data' => \app\models\Lookup::getLookupValues('ProposalType'),
            'options' => ['placeholder' => 'Please Select ...', 'style'=>'width:250px'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); 
    ?>

    <?php echo $form->field($model, 'date_submitted')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter date of submission ...'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);   ?>

    <?php  // Usage with ActiveForm and model
        echo $form->field($model, 'irb_other_approval')->widget(Select2::classname(), [
            'data' => \app\models\Lookup::getLookupValues('IrbApproval'),
            'options' => ['placeholder' => 'Please Select ...', 'style'=>'width:250px'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); 
    ?>

    <?= $form->field($model, 'sap')->widget(CKEditor::className(), [
		'options' => ['rows' => 3],
		'preset' => 'full'
	]) ?>

    <?= $form->field($model, 'pub_plan')->widget(CKEditor::className(), [
		'options' => ['rows' => 3],
		'preset' => 'full'
	]) ?>

    <?php echo $form->field($model, 'target_completion_date')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Target Completion Date'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);   ?>

    <?= $form->field($model, 'milestones')->widget(CKEditor::className(), [
		'options' => ['rows' => 3],
		'preset' => 'full'
	]) ?>


    <div class="form-group">
        <?php $url =  Url::to(['project/create']);  ?>
        <?= Html::submitButton('Add Project', ['class' =>'btn btn-success btn-create','onclick'=>"ajaxFormSubmit('$url','project-form-div-$id','project-form-$id',1); return false;"]) ?>
    </div>
 
    <?php ActiveForm::end(); ?>

</div>
