<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Beneficiary */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="beneficiary-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_intake')->textInput() ?>

    <?= $form->field($model, 'unique_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'child_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'disability')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'disability_type')->textInput() ?>

    <?= $form->field($model, 'county')->textInput() ?>

    <?= $form->field($model, 'subcounty')->textInput() ?>

    <?= $form->field($model, 'location')->textInput() ?>

    <?= $form->field($model, 'village')->textInput() ?>

    <?= $form->field($model, 'subcounty_office')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'refer_agency')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type_csec')->textInput() ?>

    <?= $form->field($model, 'type_csec_specify')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cause_csec')->textInput() ?>

    <?= $form->field($model, 'cause_csec_specify')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'activity_desc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'rescued_csec')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tracing_date')->textInput() ?>

    <?= $form->field($model, 'counseling')->textInput() ?>

    <?= $form->field($model, 'counseling_date')->textInput() ?>

    <?= $form->field($model, 'medical_care')->textInput() ?>

    <?= $form->field($model, 'medical_care_date')->textInput() ?>

    <?= $form->field($model, 'legal_support')->textInput() ?>

    <?= $form->field($model, 'legal_support_date')->textInput() ?>

    <?= $form->field($model, 'education_support')->textInput() ?>

    <?= $form->field($model, 'educational_support_date')->textInput() ?>

    <?= $form->field($model, 'vocational_training')->textInput() ?>

    <?= $form->field($model, 'vocational_training_date')->textInput() ?>

    <?= $form->field($model, 'empl_voc_training')->textInput() ?>

    <?= $form->field($model, 'empl_voc_training_date')->textInput() ?>

    <?= $form->field($model, 'provided_income')->textInput() ?>

    <?= $form->field($model, 'provided_income_date')->textInput() ?>

    <?= $form->field($model, 'parent_guard_names')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parent_guard_contacts')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'family_counseling')->textInput() ?>

    <?= $form->field($model, 'familty_counseling_date')->textInput() ?>

    <?= $form->field($model, 'family_training')->textInput() ?>

    <?= $form->field($model, 'family_training_date')->textInput() ?>

    <?= $form->field($model, 'family_income')->textInput() ?>

    <?= $form->field($model, 'family_income_date')->textInput() ?>

    <?= $form->field($model, 'main_care_arrangement')->textInput() ?>

    <?= $form->field($model, 'main_care_specify')->textInput() ?>

    <?= $form->field($model, 'main_care_agency')->textInput() ?>

    <?= $form->field($model, 'main_support_provider')->textInput() ?>

    <?= $form->field($model, 'main_support_provider_specify')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comm_contact_person')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comm_contact_person_position')->textInput() ?>

    <?= $form->field($model, 'comm_contact_person_pos_specify')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comm_contact_person_tel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'risk_level')->textInput() ?>

    <?= $form->field($model, 'followup_visit')->textInput() ?>

    <?= $form->field($model, 'case_final_result')->textInput() ?>

    <?= $form->field($model, 'cause_failure')->textInput() ?>

    <?= $form->field($model, 'cause_failure_specify')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cause_success')->textInput() ?>

    <?= $form->field($model, 'cause_success_specify')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_entry_staff')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_entry_staff_designation')->textInput() ?>

    <?= $form->field($model, 'date_created')->textInput() ?>

    <?= $form->field($model, 'date_modified')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'modified_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
