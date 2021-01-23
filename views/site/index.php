<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\utilities\DataHelper;
use yii\helpers\Url;
use kartik\export\ExportMenu;
use app\models\Project;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Analysis Projects';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-info chain-users-index">
      <div class="panel-heading">
        <h3 class='panel-title pull-left project-title'><?= Html::encode($this->title) ?></h3>
       <div class="panel-title pull-right">
            <button type="button" class="btn btn-success pull-right btn-project">
                Approved <span class="badge badge-light"><?= Project::counter("approved"); ?></span>
            </button>
            <button type="button" class="btn btn-warning pull-right btn-project">
                Pending Approval <span class="badge badge-light"><?= Project::counter("pending-approval"); ?></span>
            </button>
            <button type="button" class="btn btn-info pull-right btn-project">
                Under Review <span class="badge badge-light"><?= Project::counter("under-review"); ?></span>
            </button>
            <button type="button" class="btn btn-default pull-right">
                Submitted <span class="badge badge-light"><?= Project::counter("submitted"); ?></span>
            </button>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="panel-body row">

    
    <?php Pjax::begin(['id'=>'pjax-project']); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
       <?php
          $dh = new DataHelper();
            $url = Url::to(['project/create', 'id'=>0]);
           echo $dh->getModalButton(new \app\models\Project(), "project/create", "Project", 'btn btn-primary pull-right btn-project','New Analysis/Data Request',$url);
        ?>
    </p>
    <?php
    $model = new \app\models\Project();
    $gridColumns  = $model->getGridColumns(); 
                

        // Renders a export dropdown menu
         echo ExportMenu::widget([
            'dataProvider' => $dataProvider,
            'columns' => $gridColumns
        ]); 
    ?>

    <?php 
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
                        'label'=>'Data Manager',
                        'format'=>'raw',
                         'attribute'=>'data_manager',
                         'filter' => app\models\User::getUserFilters(),
                         'value'=> function ($data){
                            $dh = new DataHelper(); $link = "";
                            $value = app\models\User::getUserNames($data->data_manager);
                            $admin = Yii::$app->user->identity->isAdmin();
                            if($admin){
                                $url = Url::to(['project/assign','id'=>$data->id],true);
                                $value  = $dh->getModalButton($data, "project/assign", "Assign Data Manager", 'btn btn-warning', $value,$url);
        
                            }
                             return "<span class='success'>".$value."</span> ";
        
                         }
                     ],
                     [
                        'label'=>'Stage',
                        'format'=>'raw',
                         'attribute'=>'request_status',
                         'filter' => app\models\Lookup::getLookupValues("RequestStatus"),
                         'value'=> function ($data){
                            $value = app\models\Lookup::getValue("RequestStatus", $data->request_status);
                            $isSuperAdmin = Yii::$app->user->identity->isSuperAdmin();
                            if($isSuperAdmin){
                                $dh = new DataHelper();
                                $url = Url::to(['project/statusupdate','id'=>$data->id],true);
                                $link = $dh->getModalButton($data, "//project/statusupdate", "Update Request Status", 'glyphicon glyphicon-edit','update',$url);
                                return $value." &nbsp; <br/> ".$link."&nbsp;";
                            }
                            else{
                                return $value;
                            }
                            
                         }
                     ],
                     
                     ['class' => 'yii\grid\ActionColumn',
                       'template' => '{update}', //{delete}
                       'buttons' => [

                                      'update' => function ($url, $model, $keyword) {
                                            $url = Url::to(['project/index','id'=>$model->id],true);
                                            $link = Html::a("",$url,['class'=>'glyphicon glyphicon-eye-open']);
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
