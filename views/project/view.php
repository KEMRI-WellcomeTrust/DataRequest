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
            $toggle = $model->active==1?"<button type='button' class='btn btn-success btn-archived pull-right'> Active </button>":"<button type='button' class='btn btn-default pull-right btn-archived'> Archived </button>";
            $url = Url::to(['archive', 'id'=>$model->id]);
            echo Html::a($toggle, $url);
        ?>
        <?php
            $dh = new DataHelper();
                $url = Url::to(['update', 'id'=>$model->id]);
            echo $dh->getModalButton($model, "update", "Edit Project", 'btn btn-danger pull-right btn-project','Edit Request',$url);
        ?>
        <?php
            $dh = new DataHelper();
                $url2 = Url::to(['//message/book', 'project_id'=>$model->id]);
                $message = new app\models\Message();
            echo $dh->getModalButton($message, "book", "Book Meeting", 'btn btn-primary pull-right btn-project','Book Meeting with Data Team',$url2);
        ?>
        
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'project_name',
            [                      
                'label' => 'Responsible User',
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
            [                      
                'label' => 'Stage',
                'format' => "raw",
                'value' => "<span class='badge badge-success'>".Lookup::getValue("RequestStatus", $model->request_status)."</span>"
            ],
            'project_aims:html', 
            [                      
                'label' => 'Type of Data',
                'value' => Lookup::getValue("TypeData", $model->type_data),
            ],
            [                      
                'label' => 'Type of Proposal',
                'value' => Lookup::getValue("ProposalType", $model->proposal_type),
            ],
            'date_submitted',
            [                      
                'label' => 'IRB or Other Approvals',
                'value' => Lookup::getValue("IrbApproval", $model->irb_other_approval),
            ],
            [                      
                'label' => 'Statistical Analysis Plan',
                'format' => "raw",
                'value' => function($data){
                    return Html::a($data->sap, ['download','file_name'=>$data->sap]);
                }
            ],
            'pub_plan:html',
            'target_completion_date',
            'milestones:html',
            [                      
                'label' => 'Reviewed By',
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
                'value' => User::getUserNames($model->request_approved_by)
            ],
            'approval_notes:html',
            
        ],
    ]) ?>

</div>
