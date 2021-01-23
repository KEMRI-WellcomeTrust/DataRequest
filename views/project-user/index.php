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
            'name',
            'email',
            [
                'label'=>'Affiliation',
                'format'=>'html',
                 'attribute'=>'affiliation',
                 'filter' => app\models\Lookup::getLookupValues("Affiliation"),
                 'value'=> function ($data){
                     return app\models\Lookup::getValue("Affiliation", $data->affiliation);
                 }
             ],
            [
                'label'=>'Role',
                'format'=>'html',
                 'attribute'=>'role',
                 'filter' => app\models\Lookup::getLookupValues("DataAccessRole"),
                 'value'=> function ($data){
                     return app\models\Lookup::getValue("DataAccessRole", $data->role);
                 }
             ],

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{update}{delete}',
                'buttons' => [

                            'update' => function ($url, $model) {
                               
                                $dh = new DataHelper();
                                $url = Url::to(['project-user/update','id'=>$model->id],true);
                                $link  = $dh->getModalButton($model, "project-user/update", "Project", 'glyphicon glyphicon-edit','',$url);
                                return "&nbsp;".$link;
                            },
                            'delete' => function ($url, $model) {
                                $dh = new DataHelper();
                                $url = Url::to(['project-user/customdelete','id'=>$model->id],true);
                                $link  = $dh->getModalButton($model, "project-user/customdelete", "Project", 'glyphicon glyphicon-remove','',$url);
                                return "&nbsp;".$link;
                            }
                        ], 
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
