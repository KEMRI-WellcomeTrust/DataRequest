<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\utilities\DataHelper;
use yii\helpers\Url;
use kartik\export\ExportMenu;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Archived Projects';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-info chain-users-index">
      <div class="panel-heading"><h3><?= Html::encode($this->title) ?></h3></div>
      <div class="panel-body row">

    
    <?php Pjax::begin(['id'=>'pjax-project']); ?>
    <?php
    $model = new \app\models\Project();
    $gridColumns  = $model->getGridColumns(); 
                

        // Renders a export dropdown menu
         echo ExportMenu::widget([
            'dataProvider' => $dataProvider,
            'columns' => $gridColumns
        ]);  
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function ($model, $key, $index, $grid) {
            // $model is the current data model being rendered
            // check your condition in the if like `if($model->hasMedicalRecord())` which could be a method of model class which checks for medical records.
            if($model->flag_delete == 2) { 
                 return ['class' => 'highlighted_flag_delete'];
            }
            return [];
        },
        'columns' =>// $gridColumns
                    [
                       ['class' => 'yii\grid\SerialColumn'],
                       [
                        'label'=>'Project Name',
                        'format'=>'raw',
                         'attribute'=>'project_name',
                         'value'=> function ($data){
                            $url = Url::to(['project/index','id'=>$data->id],true);
                            $link = Html::a($data->project_name, $url,['class'=>'']);
                            return $link."&nbsp;";
                         }
                     ],
                     [
                        'label'=>'Type of Data',
                        'format'=>'raw',
                         'attribute'=>'type_data',
                         'filter' => app\models\Lookup::getLookupValues("TypeData"),
                         'value'=> function ($data){
                             return app\models\Lookup::getValue("TypeData", $data->type_data);
                         }
                     ],
                     [
                        'label'=>'Proposal Type',
                        'format'=>'raw',
                         'attribute'=>'proposal_type',
                         'filter' => app\models\Lookup::getLookupValues("ProposalType"),
                         'value'=> function ($data){
                             return app\models\Lookup::getValue("ProposalType", $data->proposal_type);
                         }
                     ],
                     'date_submitted',
                     [
                        'label'=>'Responsible User',
                        'format'=>'raw',
                         'attribute'=>'user_id',
                         'filter' => app\models\User::getUserFilters(),
                         'value'=> function ($data){
                             return app\models\User::getUserNames($data->user_id);
                         }
                     ],
                     [
                        'label'=>'Stage',
                        'format'=>'raw',
                         'attribute'=>'request_status',
                         'filter' => app\models\Lookup::getLookupValues("RequestStatus"),
                         'value'=> function ($data){
                            $value = $data->getRequestStatus();
                            $isSuperAdmin = Yii::$app->user->identity->isSuperAdmin();
                            if($isSuperAdmin){
                                $dh = new DataHelper();
                                
                                if($data->request_status == 5 | $data->request_status == 6 | $data->request_status == 7 | $data->request_status == 8 ){
                                    $url = Url::to(['project/complete','id'=>$data->id],true);
                                    $link = $dh->getModalButton($data, "//project/complete", "Update Request Status", 'glyphicon glyphicon-ok','complete',$url);
                                }
                                else{
                                    $url = Url::to(['project/statusupdate','id'=>$data->id],true);
                                    $link = $dh->getModalButton($data, "//project/statusupdate", "Update Request Status", 'glyphicon glyphicon-edit','update',$url);     
                                }
                                
                                return $value." &nbsp; <br/> ".$link."&nbsp;";
                            }
                            else{
                                return $value;
                            }
                         }
                     ],
                     
                     ['class' => 'yii\grid\ActionColumn',
                       'template' => '{update}',
                       'buttons' => [

                                      'update' => function ($url, $model, $keyword) {
                                            $url = Url::to(['project/index','id'=>$model->id],true);
                                            $link = Html::a("",$url,['class'=>'glyphicon glyphicon-edit']);
                                            return $link."&nbsp;";
                                      },
                                      'delete' => function ($url, $model, $keyword) {
                                            $dh = new DataHelper();
                                            $url = Url::to(['project/customdelete','id'=>$model->id],true);
                                            $link  = $dh->getModalButton($model, "project/customdelete", "Project", 'glyphicon glyphicon-remove','',$url);
                                            return "&nbsp;".$link;
                                      }
                              ], 
                      ],
                   ]  
         
         
    ]); ?>
    <?php Pjax::end(); ?>

    </div>
</div>
