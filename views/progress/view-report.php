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

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Progress', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="progress-view">
    <p>
       <?= "<h3>".$this->title."</h3>" ?> 
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'fkProject.project_name',
            'title',
            'progress_date',
            [
                'label'=>'Stage',
                'format'=>'raw',
                 'attribute'=>'stage',
                 'filter' => app\models\Lookup::getLookupValues("Stage"),
                 'value'=> function ($data){
                     return app\models\Lookup::getValue("Stage", $data->stage);
                 }
             ],
            'attach_file:ntext',
            'progress_desc:ntext',
            'challenges:ntext',
            [
                'label'=>'Submitted By',
                'format'=>'raw',
                 'attribute'=>'submitted_by',
                 'value'=> function ($data){
                     return app\models\User::getUserNames($data->submitted_by);
                 }
             ],        
        ],
    ]) ?>


    

</div>
