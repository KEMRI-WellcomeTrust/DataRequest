<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Beneficiary */
/* @var $form yii\widgets\ActiveForm */

use yii\helpers\Url;
use kartik\select2\Select2;
?>
<?php   $id = isset($model->id)?$model->id:0; $keyword = "maincare"; ?>
<div class="<?= $keyword ?>-form" id="<?= $keyword ?>-form-div-<?= $id ?>">
    <?php  $form = ActiveForm::begin(['id'=> $keyword.'-form-'.$id]); ?>
     <div id="<?= $keyword ?>-form-alert-<?= $id ?>"></div>
    
      <?php  // Usage with ActiveForm and model
        echo $form->field($model, 'main_care_arrangement')->widget(Select2::classname(), [
            'data' => \app\models\Lookup::getLookupValues('Main care'),
            'options' => ['placeholder' => 'Please Select ...', 'multiple'=>true],
            'pluginOptions' => [
                'allowClear' => true,
                'style'=>'width:250px'
            ],
        ]); 
        ?>

    <?= $form->field($model, 'main_care_specify')->textInput() ?>

    <?= $form->field($model, 'main_care_agency')->textInput() ?>


    
<div class="form-group">
         <?php $url =  Url::to(['beneficiary/update','id'=>$model->id, 'keyword'=>$keyword]); ?>
        <?= Html::submitButton('Save', ['class' =>'btn btn-success btn-create','onclick'=>"ajaxFormSubmit('$url','$keyword-form-div-$id','$keyword-form-$id',1); return false;"]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>