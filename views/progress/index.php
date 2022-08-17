<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Progress;
use app\models\ProgressSearch;
use app\utilities\DataHelper;
use yii\helpers\Url;
use yii\data\ActiveDataProvider;


/* @var $this yii\web\View */
/* @var $searchModel app\models\ProgressSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Progress Reports';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="progress-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
        $searchModel = new ProgressSearch();
        $query = Progress::find()->where(['fk_project'=>$fk_project]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['id' => SORT_DESC]]
        ]);
    Pjax::begin(['id'=>"pjax-progress"]); ?>
    <p>
       <?php
          $dh = new DataHelper();
            $url = Url::to(['progress/create', 'project_id'=>$fk_project]);
           echo $dh->getModalButton(new \app\models\Progress(), "progress/create", "Progress", 'btn btn-primary pull-right btn-project-user','Add Progress',$url);
           ?>
    </p>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
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
            'progress_desc:ntext',
            'challenges:ntext',
            'submitted_by',
            [
                'label'=>'File',
                'format'=>'raw',
                 'attribute'=>'attach_file',
                 'value'=> function ($data){
                    return Html::a($data->attach_file, ['//progress/download','file_name'=>$data->attach_file], ['target'=>"_blank"]);
                 }
                ],

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{update}{report}{delete}', //{delete}
            'buttons' => [

                    'update' => function ($url, $model, $keyword) {
                            $dh = new DataHelper();
                            $url = Url::to(['progress/update','id'=>$model->id],true);
                            return $dh->getModalButton(new \app\models\Progress(), "progress/update", "Progress", 'glyphicon glyphicon-eye-open','',$url);
                    },
                    'delete' => function ($url, $model, $keyword) {
                            $dh = new DataHelper();
                            $url = Url::to(['progress/customdelete','id'=>$model->id],true);
                            $link  = $dh->getModalButton($model, "project/customdelete", "Project", 'glyphicon glyphicon-remove','',$url);
                            return "&nbsp;".$link;
                    },
                    'report' => function ($url, $model, $keyword) {
                            $url = Url::to(['progress/report','id'=>$model->id],true);
                            $link = Html::a("",$url,['class'=>'glyphicon glyphicon-folder-open', 'target'=>"_blank"]);
                            return $link."&nbsp;";
                    }
                ], 
            ]
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
