<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\export\ExportMenu;
use app\utilities\DataHelper;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Analysis Projects';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-info project-index chain-users-index">

    <div class="panel-heading">
      <div class="panel-title pull-left">
          <h3><?php
            if($id==0){
                echo "New Analysis Project";
                $model = new \app\models\Project();
            }  
            else{
                $model = \app\models\Project::find()->where(['id'=>$id])->one();
                echo $model->project_name;   
            }
            
          ?></h3>
        </div>
          <div class="panel-title pull-right">
            <?php
                $dh = new DataHelper();
                $user_id = Yii::$app->user->identity->id;
                if($id > 0){
                    $reviewer = Yii::$app->user->identity->isReviewer();
                    if($reviewer == true && ($user_id != $model->user_id)){
                        if(in_array($model->projectStatus(), ['Submitted','Returned for corrections', 'Re-submitted with corrections'])){
                            $url = Url::to(['review', 'id'=>$model->id]);
                            echo $dh->getModalButton($model, "review", "Review Project", 'btn btn-warning btn-project','Review',$url);
                        }
                        
                    }
                    $isApprover = Yii::$app->user->identity->isApprover();
                    if($isApprover == true && ($user_id != $model->user_id)){
                        if($model->projectStatus() == 'Data Review Complete'){
                            $url = Url::to(['approve', 'id'=>$model->id]);
                            echo $dh->getModalButton($model, "approve", "Approve Project", 'btn btn-danger btn-project','Approve',$url);

                        }
                    }
                    
                }
            ?>
        </div>
        <div class="clearfix"></div>
      </div>
        <div class="panel-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item active"><a class="nav-link active" data-toggle="tab" href="#generalinfo" role="tab">General Information</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#datarequest" role="tab"> Data Request </a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#projectusers" role="tab">People with access to data</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#messages" role="tab">Messages</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#progress" role="tab">Progress</a></li>
             
            </ul>
            
            <div class="tab-content">
                <div class="tab-pane active" id="generalinfo" role="tabpanel">
                    <?php
                       echo Yii::$app->controller->renderPartial("view", [
                            'model'=>$model
                        ]); 
                    ?>
                  </div>
                <div class="tab-pane" id="datarequest" role="tabpanel">
                    <?php

                       echo Yii::$app->controller->renderPartial("//data-request/index", [
                            'project_id'=>$model->id
                        ]); ?>
                  </div>
                <div class="tab-pane" id="projectusers" role="tabpanel">
                    <?php

                       echo Yii::$app->controller->renderPartial("//project-user/index", [
                        'project_id'=>$model->id
                        ]); ?>
                  </div>
                  <div class="tab-pane" id="messages" role="tabpanel">
                    <?php

                       echo Yii::$app->controller->renderPartial("//message/index", [
                        'project_id'=>$model->id
                        ]); ?>
                  </div>
                  <div class="tab-pane" id="progress" role="tabpanel">
                    <?php

                       echo Yii::$app->controller->renderPartial("//progress/index", [
                        'fk_project'=>$model->id
                        ]); ?>
                  </div>
                
                
            </div>
            
        </div>
</div>
