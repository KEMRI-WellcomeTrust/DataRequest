<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Sibling */
/* @var $form yii\widgets\ActiveForm */
?>
<?php   $id = isset($model->id)?$model->id:0; ?>
<div class="sibling-form" id="sibling-form-div-<?= $id ?>">
    <?php  $form = ActiveForm::begin(['id'=>'sibling-form-'.$id]); ?>
     <div id="sibling-form-alert-<?= $id ?>"></div>

    <?= $form->field($model, 'fk_beneficiary')->hiddenInput()->label("") ?>

    <?= $form->field($model, 'sibling_names')->textInput(['maxlength' => true]) ?>

      <?php echo $form->field($model, 'sibling_dob')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter date ...'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);   ?>

    <?= $form->field($model, 'sibling_school')->textInput(['maxlength' => true]) ?>

     <div class="form-group">
         <?php if($model->isNewRecord){ $url =  Url::to(['sibling/create']); }else { $url =  Url::to(['sibling/update','id'=>$model->id]); } ?>
        <?= Html::submitButton('Save', ['class' =>'btn btn-success btn-create','onclick'=>"ajaxFormSubmit('$url','sibling-form-div-$id','sibling-form-$id',1); return false;"]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
