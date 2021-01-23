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
<?php   $id = isset($model->id)?$model->id:0; ?>
<div class="data-request-form" id="data-request-form-div-<?= $id ?>">
    <?php  $form = ActiveForm::begin(['id'=>'data-request-form-'.$id]); ?>
     <div id="data-request-form-alert-<?= $id ?>"></div>

    <?php  // Usage with ActiveForm and model
        echo $form->field($model, 'data_manager')->widget(Select2::classname(), [
            'data' => \app\models\User::getUserFilters(),
            'options' => ['placeholder' => 'Please Select ...', 'style'=>'width:250px', 'title' => "Data manager",
            'data-toggle' => 'tooltip'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])
    ?>

<div class="form-group">
        <?php 
            $url =  Url::to(['data-request/assign', 'id'=>$model->id]); 
        ?>
        <?= Html::submitButton('Submit', ['class' =>'btn btn-success','onclick'=>"ajaxFormSubmit('$url','data-request-form-div-$id','data-request-form-$id',1); return false;"]) ?>
    </div>
 
    <?php ActiveForm::end(); ?>

</div>
