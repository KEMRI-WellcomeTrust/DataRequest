<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Lookup;
use kartik\widgets\Select2;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectUser */
/* @var $form yii\widgets\ActiveForm */
?>
 
 <?php   $id = isset($model->id)?$model->id:0; ?>
<div class="project-user-form" id="project-user-form-div-<?= $id ?>">
    <?php  $form = ActiveForm::begin(['id'=>'project-user-form-'.$id]); ?>
     <div id="project-user-form-alert-<?= $id ?>"></div>

     <?= "<h3> People who will access data in this analysis </h3>"; ?>

    <?php echo $form->field($model, 'project_id')->hiddenInput(['value'=> $model->project_id,'readonly'=>true])->label(false)  
    ?>

    <?php 
        $hint = "Names of the collaborator";
        echo $form->field($model, 'name')->textInput(['maxlength' => true, 'title' => $hint, 'data-toggle' => 'tooltip'])->hint($hint); 
    ?>

    <?php 
        $hint = "Email address";
        echo $form->field($model, 'email')->textInput(['maxlength' => true, 'title' => $hint, 'data-toggle' => 'tooltip'])->hint($hint); 
    ?>

    <?php  // Usage with ActiveForm and model
        $hint = "Collaborator's institution";
        echo $form->field($model, 'affiliation')->widget(Select2::classname(), [
            'data' => \app\models\Lookup::getLookupValues('Affiliation'),
            'options' => ['placeholder' => 'Please Select ...', 'style'=>'width:250px', 'title' => $hint,
            'data-toggle' => 'tooltip'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->hint($hint); 
    ?>

    <?php  // Usage with ActiveForm and model
        $hint = "Participation role in this project";
        echo $form->field($model, 'role')->widget(Select2::classname(), [
            'data' => \app\models\Lookup::getLookupValues('DataAccessRole'),
            'options' => ['placeholder' => 'Please Select ...', 'style'=>'width:250px', 'title' => $hint,
            'data-toggle' => 'tooltip'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->hint($hint); 
    ?>

    <div class="form-group">
        <?php 
        if($model->isNewRecord){
            $url =  Url::to(['project-user/create', 'project_id'=>$model->project_id]); 
        }
        else{
            $url =  Url::to(['project-user/update', 'id'=>$model->id]); 
        }
        
        ?>
        <?php 
            $continueurl = $url."&flag=0";
            echo Html::submitButton('Save and Continue', ['class' =>'btn btn-primary btn-create pull-left','onclick'=>"ajaxFormSubmit('$continueurl','project-user-form-div-$id','project-user-form-$id',1); return false;"]) 
        ?>
        <?php
            $completeurl = $url."&flag=1";
            echo Html::submitButton('Save and Complete', ['class' =>'btn btn-success btn-create pull-right','onclick'=>"ajaxFormSubmit('$completeurl','project-user-form-div-$id','project-user-form-$id',1); return false;"]) 
        ?>
        <span> &nbsp; </span>
    </div>

    <?php ActiveForm::end(); ?>

</div>
