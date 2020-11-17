<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\data\ActiveDataProvider;
use app\models\ProjectUser;
use app\models\ProjectUserSearch;
use app\utilities\DataHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProjectUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
        $searchModel = new ProjectUserSearch();
        $query = ProjectUser::find()->where(['project_id'=>$project_id]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
    Pjax::begin(['id'=>"pjax-project-user"]); ?>

 <p>
       <?php
          $dh = new DataHelper();
            $url = Url::to(['project-user/create', 'project_id'=>$project_id]);
           echo $dh->getModalButton(new \app\models\ProjectUser(), "project-user/create", "ProjectUser", 'btn btn-primary pull-right btn-project-user','Add New Person',$url);
           ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'project_id',
            'name',
            'affiliation',
            'role',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
