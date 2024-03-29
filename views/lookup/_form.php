<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\Lookup */
/* @var $form yii\widgets\ActiveForm */
?>
<?php   $id = isset($model->id)?$model->id:0; ?>
<div class="lookup-form" id="lookup-form-div-<?= $id ?>">
    <?php  $form = ActiveForm::begin(['id'=>'lookup-form-'.$id]); ?>
     <div id="lookup-form-alert-<?= $id ?>"></div>

    <?= $form->field($model, 'fk_category')->hiddenInput()->label("") ?>

    <?= $form->field($model, 'value')->textarea(['rows' => 6]) ?>

     <div class="form-group">
         <?php 
            
            if($model->isNewRecord){ 
                $url =  Url::to(['lookup/create']); 
                $url_reload =  Url::to(['lookup/create','continue'=>True]);
             }else { 
                 $url =  Url::to(['lookup/update','id'=>$model->id]); 
            } 
        ?>
        <?php
        if($model->isNewRecord){ 
            echo  Html::submitButton('Submit and Continue', ['class' =>'btn btn-primary pull-left','onclick'=>"ajaxFormSubmit('$url_reload','lookup-form-div-$id','lookup-form-$id',1); return false;"]); 
        }
        ?>
        <?= Html::submitButton('Submit and Complete', ['class' =>'btn btn-success pull-right','onclick'=>"ajaxFormSubmit('$url','lookup-form-div-$id','lookup-form-$id',1); return false;"]) ?>
    </div>

    <?php ActiveForm::end(); ?>
   <p>&nbsp; </p>         
</div>
