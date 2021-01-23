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
                'value' => "<span class='badge badge-info'>
                ".User::getUserNames($model->user_id)." 
                </span>"
            ], 
            [                      
                'label' => 'Data Manager',
                'format' => "raw",
                'value' => "<span class='badge badge-secondary'>".User::getUserNames($model->data_manager)."</span>"
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
                'value' => "<span class='badge badge-secondary'>".User::getUserNames($model->reviewed_by)."</span>"
            ],
            'review_date',
            'review_comments:html',
            [                      
                'label' => 'Approved By',
                'format' => "raw",
                'value' => "<span class='badge badge-secondary'>".User::getUserNames($model->approved_by)."</span>"
            ],
            'approved_date',
            [                      
                'label' => 'Approval Status',
                'format' => "raw",
                'value' => "<span class='badge badge-danger'>".Lookup::getValue("DataStatus", $model->status)."</span>"
            ],
            'status_comments:html',
            [                      
                'label' => 'Issued?',
                'format' => "raw",
                'value' => "<span class='badge badge-success'>".Lookup::getValue("IssuedStatus", $model->issued_status)."</span>"
            ]
        ],
    ]) ?>

</div>
