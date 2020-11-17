<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url

/* @var $this yii\web\View */
/* @var $model app\models\LookupCategory */
/* @var $form yii\widgets\ActiveForm */
?>
<?php   $id = isset($model->id)?$model->id:0; ?>
<div class="lookup-category-form" id="lookup-category-form-div-<?= $id ?>">

    <?php  $form = ActiveForm::begin(['id'=>'lookup-category-form-'.$id]); ?>
     <div id="lookup-category-form-alert-<?= $id ?>"></div>

    <?= $form->field($model, 'category_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?php if($model->isNewRecord){ $url =  Url::to(['lookup-category/create']); }else { $url =  Url::to(['lookup-category/update','id'=>$model->id]); } ?>
        <?= Html::submitButton('Add Question Category', ['class' =>'btn btn-success btn-create','onclick'=>"ajaxFormSubmit('$url','lookup-category-form-div-$id','lookup-category-form-$id',1); return false;"]) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
