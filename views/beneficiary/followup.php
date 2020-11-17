<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Beneficiary */
/* @var $form yii\widgets\ActiveForm */

?>
<div class="beneficiary-form-1">

<?php $form = ActiveForm::begin(); ?>
    
    
    <?= $form->field($model, 'risk_level')->textInput() ?>

    <?= $form->field($model, 'followup_visit')->textInput() ?>

<div class="form-group pull-right">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>