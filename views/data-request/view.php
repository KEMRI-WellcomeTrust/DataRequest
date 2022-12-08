<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\User;
use app\models\Project;
use app\models\Lookup;
use app\utilities\DataHelper;

/* @var $this yii\web\View */
/* @var $model app\models\DataRequest */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Data Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="data-request-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [                      
                'label' => 'Project Name',
                'format' => "raw",
                'value' => "<span class='badge badge-success'>
                ".Project::getName($model->project_id)." 
                </span>"
            ], 
            [                      
                'label' => 'Primary Contact',
                'format' => "raw",
                'value' => User::getUserNames($model->user_id)
            ], 
            [                      
                'label' => 'Data Manager',
                'format' => "raw",
                'value' => User::getUserNames($model->data_manager)
            ],
            'data_crfs:html',
            'data_variables:html',
            'data_sites',
            'date_from',
            'date_to',
            'other_info:html',
            'received_date',
            [                      
                'label' => 'Reviewed By',
                'format' => "raw",
                'value' => User::getUserNames($model->reviewed_by)
            ],
            'review_date',
            'review_comments:html',
            [                      
                'label' => 'Approved By',
                'format' => "raw",
                'value' => User::getUserNames($model->approved_by)
            ],
            'approved_date',
            [                      
                'label' => 'Approval Status',
                'format' => "raw",
                'value' => $model->getDataStatus()
            ],
            'status_comments:html',
            [                      
                'label' => 'Issued?',
                'format' => "raw",
                'value' => "<span class='badge badge-success'>".Lookup::getValue("IssuedStatus", $model->issued_status)."</span>"
            ],
            'issued_date'
        ],
    ]) ?>

</div>
