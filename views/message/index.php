<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\MessageSearch;
use app\models\Message;
use app\utilities\DataHelper;
use yii\helpers\Url;
use yii\data\ActiveDataProvider;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MessageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Messages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="message-index">
    <?php
        $searchModel = new MessageSearch();
        $query = Message::find()->where(['project_id'=>$project_id]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['id' => SORT_DESC]]
        ]);
    Pjax::begin(['id'=>"pjax-message"]); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'msg_from',
            //'msg_to',
            'date_created',
            [
                'label'=>'Message',
                'format'=>'html',
                 'attribute'=>'msg_body',
                 //'filter' => app\models\User::getUserFilters(),
                 //'value'=> function ($data){return app\models\User::getUserNames($data->user_id);}
             ],
            //'msg_status',
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
