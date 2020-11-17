<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Beneficiary */
/* @var $form yii\widgets\ActiveForm */

use yii\helpers\Url;
?>
<?php   $id = isset($model->id)?$model->id:0; $keyword = "childlabourtriggers"; ?>
<div class="<?= $keyword ?>-form" id="<?= $keyword ?>-form-div-<?= $id ?>">
    <?php  $form = ActiveForm::begin(['id'=> $keyword.'-form-'.$id]); ?>
     <div id="<?= $keyword ?>-form-alert-<?= $id ?>"></div>
    
     <?php  // Usage with ActiveForm and model
        echo $form->field($model, 'type_csec')->widget(Select2::classname(), [
            'data' => \app\models\Lookup::getLookupValues('Type of CSEC'),
            'options' => ['placeholder' => 'Please Select ...', 'multiple' => true],
            'pluginOptions' => [
                'allowClear' => true,
                'style'=>'width:250px'
            ],
        ]); 
        ?>

    <?= $form->field($model, 'type_csec_specify')->textInput(['maxlength' => true]) ?>

    <?php  // Usage with ActiveForm and model
        echo $form->field($model, 'cause_csec')->widget(Select2::classname(), [
            'data' => \app\models\Lookup::getLookupValues('causes of involvement in CSEC'),
            'options' => ['placeholder' => 'Please Select ...', 'multiple' => true],
            'pluginOptions' => [
                'allowClear' => true,
                'style'=>'width:250px'
            ],
        ]); 
        ?>

    <?= $form->field($model, 'cause_csec_specify')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
         <?php $url =  Url::to(['beneficiary/update','id'=>$model->id, 'keyword'=>$keyword]); ?>
        <?= Html::submitButton('Save', ['class' =>'btn btn-success btn-create','onclick'=>"ajaxFormSubmit('$url','$keyword-form-div-$id','$keyword-form-$id',1,1); return false;"]);  ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
