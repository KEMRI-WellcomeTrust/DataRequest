<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Lookup;
use app\models\User;
use app\utilities\DataHelper;
use yii\helpers\Url;
use app\models\DataRequest;
use app\models\Project;
use app\models\ProjectUser;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Project */

$this->title = $model->project_name;
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="project-view">
    <p>
       <?= "<h3>".$this->title."</h3>" ?> 
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'project_name',
            [                      
                'label' => 'Responsible User',
                'format' => "raw",
                'value' => "<span style=''>
                ".User::getUserNames($model->user_id)." 
                </span>"
            ], 
            [                      
                'label' => 'Data Manager',
                'format' => "raw",
                'value' => "<span style=''>".User::getUserNames($model->data_manager)."</span>"
            ],
            [                      
                'label' => 'Stage',
                'format' => "raw",
                'value' => "<span class=''>".Lookup::getValue("RequestStatus", $model->request_status)."</span>"
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
            ],

            [                      
                'label' => 'Reviewed By',
                'format' => 'raw',
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
                'format' => 'raw',
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


    <?php
        #Data Requests
        $datarequests = DataRequest::findAll(['project_id'=>$model->id]);
        if($datarequests){
            $i = 1;
            foreach($datarequests as $dr){
                echo "<h3>Data Request ".$i."</h3>";
              echo  DetailView::widget([
                    'model' => $dr,
                    'attributes' => [
                        'id',
                        [                      
                            'label' => 'Data Manager',
                            'format' => "raw",
                            'value' => "<span class=''>".User::getUserNames($dr->data_manager)."</span>"
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
                            'value' => "<span class=''>".User::getUserNames($dr->reviewed_by)."</span>"
                        ],
                        'review_date',
                        'review_comments:html',
                        [                      
                            'label' => 'Approved By',
                            'format' => "raw",
                            'value' => "<span class=''>".User::getUserNames($dr->approved_by)."</span>"
                        ],
                        'approved_date',
                        [                      
                            'label' => 'Approval Status',
                            'format' => "raw",
                            'value' => "<span class=''>".Lookup::getValue("DataStatus", $dr->status)."</span>"
                        ],
                        'status_comments:html',
                        [                      
                            'label' => 'Issued?',
                            'format' => "raw",
                            'value' => "<span class=''>".Lookup::getValue("IssuedStatus", $dr->issued_status)."</span>"
                        ],
                        'issued_date'
                    ],
                ]);
                $i++;
            }
        }

        #People who have access to data
        echo "<h3> People who have access to data </h3>";
        $query = ProjectUser::find()->where(['project_id'=>$model->id]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        if($dataProvider){
            echo  GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'name',
                    [
                        'label'=>'Affiliation',
                        'format'=>'html',
                         'attribute'=>'affiliation',
                         'filter' => app\models\Lookup::getLookupValues("Affiliation"),
                         'value'=> function ($data){
                             return app\models\Lookup::getValue("Affiliation", $data->affiliation);
                         }
                     ],
                    [
                        'label'=>'Role',
                        'format'=>'html',
                         'attribute'=>'role',
                         'filter' => app\models\Lookup::getLookupValues("DataAccessRole"),
                         'value'=> function ($data){
                             return app\models\Lookup::getValue("DataAccessRole", $data->role);
                         }
                     ]

                ]
            ]); 
            
        }
        #Provide a link to web access.
        echo "<h3 style='text-align:center'>".Html::a("Access this request online!", ['index','id'=>$model->id])."</h3>";
    ?>

</div>
