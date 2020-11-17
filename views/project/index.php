<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\export\ExportMenu;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Analysis Projects';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-info project-index chain-users-index">

    <div class="panel-heading">
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
        <div class="panel-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item active"><a class="nav-link active" data-toggle="tab" href="#generalinfo" role="tab">General Information</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#datarequest" role="tab"> Data Request </a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#projectusers" role="tab">People with access to data</a></li>
             
            </ul>
            
            <div class="tab-content">
                <div class="tab-pane active" id="generalinfo" role="tabpanel">
                    <?php

                       echo Yii::$app->controller->renderPartial("view", [
                            'model'=>$model
                        ]); ?>
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
                
                
            </div>
            
        </div>
</div>
