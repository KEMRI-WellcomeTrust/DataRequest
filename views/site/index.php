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
    <div class="panel-body row">
        <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#concept">Concept Notes</a></li>
        <li><a data-toggle="tab" href="#sap">Statistical Analysis Plans</a></li>
        <li><a data-toggle="tab" href="#analysis">Analysis Stage</a></li>
        <li><a data-toggle="tab" href="#manuscript">Manuscript Development</a></li>
        <li><a data-toggle="tab" href="#pub">Publication Stage</a></li>
        </ul>
        <?php #clone dataproviders
         $concept_dp = clone $dataProvider;
         $sap_dp = clone $dataProvider;
         $analysis_dp = clone $dataProvider;
         $manuscript_dp = clone $dataProvider;
         $pub_dp = clone $dataProvider;
        ?>
        <div class="tab-content">
        <div id="concept" class="tab-pane fade in active">
            <?php
                $stage = "Concept";
                $stage_query = Project::getStageQuery($stage);
                $status_query = Project::getStatusQuery($status);
                $concept_dp->query->andWhere($status_query)->andWhere($stage_query)->orderBy(['id'=>SORT_DESC]);
                echo Yii::$app->controller->renderPartial("project", [
                    'dataProvider' => $concept_dp,
                    'searchModel' => $searchModel,
                    'status'=>$status,
                    'stage' => $stage
                ]); 
            ?>
        </div>
        <div id="sap" class="tab-pane fade">
            <?php
                $stage = "SAP";
                $stage_query = Project::getStageQuery($stage);  echo $stage_query;
                $sap_dp->query->andWhere($stage_query)->orderBy(['id'=>SORT_DESC]);
                echo Yii::$app->controller->renderPartial("project", [
                    'dataProvider' => $sap_dp,
                    'searchModel' => $searchModel,
                    'status'=>$status,
                    'stage' => $stage
                ]); 
            ?>
        </div>
        <div id="analysis" class="tab-pane fade">
            <?php
                $stage = "Analysis";
                $stage_query = Project::getStageQuery($stage);  
                $analysis_dp->query->andWhere($stage_query)->orderBy(['id'=>SORT_DESC]);
                echo Yii::$app->controller->renderPartial("project", [
                    'dataProvider' => $analysis_dp,
                    'searchModel' => $searchModel,
                    'status'=>$status,
                    'stage' => $stage
                ]); 
            ?>
        </div>
        <div id="manuscript" class="tab-pane fade">
            <?php
                $stage = "Manuscript";
                $stage_query = Project::getStageQuery($stage);  
                $manuscript_dp->query->andWhere($stage_query)->orderBy(['id'=>SORT_DESC]);
                echo Yii::$app->controller->renderPartial("project", [
                    'dataProvider' => $manuscript_dp,
                    'searchModel' => $searchModel,
                    'status'=>$status,
                    'stage' => $stage
                ]); 
            ?>
        </div>
        <div id="pub" class="tab-pane fade">
            <?php
                $stage = "Publication";
                $stage_query = Project::getStageQuery($stage);  
                $pub_dp->query->andWhere($stage_query)->orderBy(['id'=>SORT_DESC]);
                echo Yii::$app->controller->renderPartial("project", [
                    'dataProvider' => $pub_dp,
                    'searchModel' => $searchModel,
                    'status'=>$status,
                    'stage' => $stage
                ]); 
            ?>
        </div>

        </div>
    </div>
</div>

