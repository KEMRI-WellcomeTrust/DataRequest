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

    <?php  // Usage with ActiveForm and model
        echo $form->field($model, 'request_status')->widget(Select2::classname(), [
            'data' => \app\models\Lookup::getLookupValues('ApprovalStatus'),
            'options' => ['placeholder' => 'Please Select ...', 'style'=>'width:250px'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); 
    ?>

    <?= $form->field($model, 'approval_notes')->textarea(['rows' => 3]) ?>

<div class="form-group">
        <?php 
            $url =  Url::to(['project/approve', 'id'=>$model->id]); 
        ?>
        <?= Html::submitButton('Submit Approval', ['class' =>'btn btn-success','onclick'=>"ajaxFormSubmit('$url','project-form-div-$id','project-form-$id',1); return false;"]) ?>
    </div>
 
    <?php ActiveForm::end(); ?>

</div>
