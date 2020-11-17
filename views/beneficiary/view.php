<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Beneficiary */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Beneficiaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="beneficiary-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'fname',
            'mname',
            'lname',
            'date_intake',
            'unique_id',
            'child_status',
            'gender',
            'disability',
            'disability_type',
            'county',
            'subcounty',
            'location',
            'village',
            'subcounty_office',
            'refer_agency',
            'type_csec',
            'type_csec_specify',
            'cause_csec',
            'cause_csec_specify',
            'activity_desc:ntext',
            'rescued_csec',
            'tracing_date',
            'counseling',
            'counseling_date',
            'medical_care',
            'medical_care_date',
            'legal_support',
            'legal_support_date',
            'education_support',
            'educational_support_date',
            'vocational_training',
            'vocational_training_date',
            'empl_voc_training',
            'empl_voc_training_date',
            'provided_income',
            'provided_income_date',
            'parent_guard_names',
            'parent_guard_contacts:ntext',
            'family_counseling',
            'familty_counseling_date',
            'family_training',
            'family_training_date',
            'family_income',
            'family_income_date',
            'main_care_arrangement',
            'main_care_specify',
            'main_care_agency',
            'main_support_provider',
            'main_support_provider_specify',
            'comm_contact_person',
            'comm_contact_person_position',
            'comm_contact_person_pos_specify',
            'comm_contact_person_tel',
            'risk_level',
            'followup_visit',
            'case_final_result',
            'cause_failure',
            'cause_failure_specify',
            'cause_success',
            'cause_success_specify',
            'data_entry_staff',
            'data_entry_staff_designation',
            'date_created',
            'date_modified',
            'created_by',
            'modified_by',
        ],
    ]) ?>

</div>
