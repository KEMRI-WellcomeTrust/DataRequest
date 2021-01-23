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
<div class="project-form" id="project-form-div-<?= $id ?>">
    <?php  $form = ActiveForm::begin(['id'=>'project-form-'.$id]); ?>
     <div id="project-form-alert-<?= $id ?>"></div>

  
    <?= $form->field($model, 'review_notes')->textarea(['rows' => 3, 'value' => ""]) ?>

<div class="form-group">
        <?php 
            $url =  Url::to(['project/review', 'id'=>$model->id]); 
        ?>
        <?= Html::submitButton('Submit Review', ['class' =>'btn btn-success','onclick'=>"ajaxFormSubmit('$url','project-form-div-$id','project-form-$id',1); return false;"]) ?>
    </div>
 
    <?php ActiveForm::end(); ?>

</div>
