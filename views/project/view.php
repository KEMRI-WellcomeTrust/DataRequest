<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Lookup;
use app\models\User;
use app\utilities\DataHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Project */

$this->title = $model->project_name;
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="project-view">
    <p>
        <?php
            $dh = new DataHelper();
            $label = "<button type='button' class='btn btn-info btn-project pull-right'> View in PDF </button>";
            $url = Url::to(['report', 'id'=>$model->id]);
            echo Html::a($label, $url);
        ?>
        <?php
           # $dh = new DataHelper();
           # $toggle = $model->active==1?"<button type='button' class='btn btn-success btn-archived pull-right'> Active </button>":"<button type='button' class='btn btn-default pull-right btn-archived'> Archived </button>";
           # $url = Url::to(['archive', 'id'=>$model->id]);
           # echo Html::a($toggle, $url);
        ?>
        <?php
                $url2 = Url::to(['//message/book', 'project_id'=>$model->id]);
                $message = new app\models\Message();
            echo $dh->getModalButton($message, "book", "Book Meeting", 'btn btn-primary pull-right btn-project','Book Meeting with Data Team',$url2);
        ?>
        <?php
            $url = Url::to(['update', 'id'=>$model->id]);
            echo $dh->getModalButton($model, "update", "Edit Project", 'btn btn-danger pull-right btn-project','Edit Request',$url);
        ?>
        
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'project_name',
            [                      
                'label' => 'Primary Contact',
                'format' => "raw",
                'value' => User::getUserNames($model->user_id)
            ], 
            [                      
                'label' => 'Primary Contact Email',
                'format' => "raw",
                'value' => $model->proposer_email
            ],
            [                      
                'label' => 'Data Manager',
                'format' => "raw",
                'value' => $model->getDataManager()
            ],
            [                      
                'label' => 'Members Involved',
                'format' => "raw",
                'value' => $model->members_involved
            ],
            [                      
                'label' => 'Date Submitted',
                'format' => "raw",
                'value' => $model->date_submitted
            ],
            'general_problem:html', 
            'project_aims:html', 
            [                      
                'label' => 'Type of Proposal',
                'value' => Lookup::getValue("ProposalType", $model->proposal_type),
            ],
            'milestones:html',
            [
                'label'=>'Stage',
                 'value'=> function ($model){
                     return app\models\Lookup::getValue("Stage", $model->stage);
                 }
             ],
            'pub_plan:html',
            'est_concept_date:html',
            'est_sap_date:html',
            'est_analysis_date:html',
            'est_manuscript_date:html',
            'est_pub_date:html',
            /*
            [                      
                'label' => 'Resource Required',
                'value' => Lookup::getValue("ResourceRequired", $model->resource_required),
            ],
            [                      
                'label' => 'Resource Type',
                'value' => Lookup::getValue("ResourceType", $model->resource_type)
            ],
            [                      
                'label' => 'Resource Duration',
                'value' => $model->resource_duration,
            ],   ***/
            [                      
                'label' => 'Reviewed By',
                'format' => "raw",
                'value' => User::getUserNames($model->request_reviewed_by)
            ],
            'date_review',
            'review_notes:html',
            [                      
                'label' => 'Approval Status Date',
                'value' => $model->date_approved,
            ],
            [                      
                'label' => 'Approved By',
                'format' => "raw",
                'value' => User::getUserNames($model->request_approved_by)
            ],
            'approval_notes:html',

            [                      
                'label' => 'Completed',
                'value' => Lookup::getValue("Completed", $model->resource_required),
            ],
            'date_completed'
            
        ],
    ]) ?>

</div>
