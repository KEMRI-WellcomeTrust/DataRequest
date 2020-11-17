<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\data\ActiveDataProvider;
use app\models\DataRequestSearch;
use app\models\DataRequest;
use app\utilities\DataHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DataRequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-request-index">

<h1><?= Html::encode($this->title) ?></h1>
    <?php
        $searchModel = new DataRequestSearch();
        $query = DataRequest::find()->where(['project_id'=>$project_id]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
    
    Pjax::begin(['id'=>"pjax-data-request"]); ?>

    <p>
       <?php
          $dh = new DataHelper();
            $url = Url::to(['data-request/create', 'project_id'=>$project_id]);
           echo $dh->getModalButton(new \app\models\DataRequest(), "data-request/create", "DataRequest", 'btn btn-primary pull-right btn-project-user','Add a Data Request',$url);
           ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'project_id',
            'user_id',
            'data_crfs:ntext',
            'data_variables:ntext',
            //'data_sites',
            //'date_from',
            //'date_to',
            //'other_info:ntext',
            //'received_date',
            //'reviewed_by',
            //'approved_by',
            //'approved_date',
            //'status',
            //'status_comments:ntext',
            //'feedback:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
