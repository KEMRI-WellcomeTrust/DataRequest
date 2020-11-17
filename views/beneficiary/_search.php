<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BeneficiarySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="beneficiary-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'fname') ?>

    <?= $form->field($model, 'mname') ?>

    <?= $form->field($model, 'lname') ?>

    <?= $form->field($model, 'date_intake') ?>

    <?php // echo $form->field($model, 'unique_id') ?>

    <?php // echo $form->field($model, 'child_status') ?>

    <?php // echo $form->field($model, 'gender') ?>

    <?php // echo $form->field($model, 'disability') ?>

    <?php // echo $form->field($model, 'disability_type') ?>

    <?php // echo $form->field($model, 'county') ?>

    <?php // echo $form->field($model, 'subcounty') ?>

    <?php // echo $form->field($model, 'location') ?>

    <?php // echo $form->field($model, 'village') ?>

    <?php // echo $form->field($model, 'subcounty_office') ?>

    <?php // echo $form->field($model, 'refer_agency') ?>

    <?php // echo $form->field($model, 'type_csec') ?>

    <?php // echo $form->field($model, 'type_csec_specify') ?>

    <?php // echo $form->field($model, 'cause_csec') ?>

    <?php // echo $form->field($model, 'cause_csec_specify') ?>

    <?php // echo $form->field($model, 'activity_desc') ?>

    <?php // echo $form->field($model, 'rescued_csec') ?>

    <?php // echo $form->field($model, 'tracing_date') ?>

    <?php // echo $form->field($model, 'counseling') ?>

    <?php // echo $form->field($model, 'counseling_date') ?>

    <?php // echo $form->field($model, 'medical_care') ?>

    <?php // echo $form->field($model, 'medical_care_date') ?>

    <?php // echo $form->field($model, 'legal_support') ?>

    <?php // echo $form->field($model, 'legal_support_date') ?>

    <?php // echo $form->field($model, 'education_support') ?>

    <?php // echo $form->field($model, 'educational_support_date') ?>

    <?php // echo $form->field($model, 'vocational_training') ?>

    <?php // echo $form->field($model, 'vocational_training_date') ?>

    <?php // echo $form->field($model, 'empl_voc_training') ?>

    <?php // echo $form->field($model, 'empl_voc_training_date') ?>

    <?php // echo $form->field($model, 'provided_income') ?>

    <?php // echo $form->field($model, 'provided_income_date') ?>

    <?php // echo $form->field($model, 'parent_guard_names') ?>

    <?php // echo $form->field($model, 'parent_guard_contacts') ?>

    <?php // echo $form->field($model, 'family_counseling') ?>

    <?php // echo $form->field($model, 'familty_counseling_date') ?>

    <?php // echo $form->field($model, 'family_training') ?>

    <?php // echo $form->field($model, 'family_training_date') ?>

    <?php // echo $form->field($model, 'family_income') ?>

    <?php // echo $form->field($model, 'family_income_date') ?>

    <?php // echo $form->field($model, 'main_care_arrangement') ?>

    <?php // echo $form->field($model, 'main_care_specify') ?>

    <?php // echo $form->field($model, 'main_care_agency') ?>

    <?php // echo $form->field($model, 'main_support_provider') ?>

    <?php // echo $form->field($model, 'main_support_provider_specify') ?>

    <?php // echo $form->field($model, 'comm_contact_person') ?>

    <?php // echo $form->field($model, 'comm_contact_person_position') ?>

    <?php // echo $form->field($model, 'comm_contact_person_pos_specify') ?>

    <?php // echo $form->field($model, 'comm_contact_person_tel') ?>

    <?php // echo $form->field($model, 'risk_level') ?>

    <?php // echo $form->field($model, 'followup_visit') ?>

    <?php // echo $form->field($model, 'case_final_result') ?>

    <?php // echo $form->field($model, 'cause_failure') ?>

    <?php // echo $form->field($model, 'cause_failure_specify') ?>

    <?php // echo $form->field($model, 'cause_success') ?>

    <?php // echo $form->field($model, 'cause_success_specify') ?>

    <?php // echo $form->field($model, 'data_entry_staff') ?>

    <?php // echo $form->field($model, 'data_entry_staff_designation') ?>

    <?php // echo $form->field($model, 'date_created') ?>

    <?php // echo $form->field($model, 'date_modified') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'modified_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
