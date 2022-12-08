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
            [
                'label'=>'Primary Contact',
                'format'=>'raw',
                 'attribute'=>'user_id',
                 'filter' => app\models\User::getUserFilters(),
                 'value'=> function ($data){
                     return app\models\User::getUserNames($data->user_id);
                 }
             ],
            'data_crfs:ntext',
            'data_variables:ntext',
            'data_sites',
            [
                'label'=>'Data Manager',
                'format'=>'raw',
                 'attribute'=>'data_manager',
                 'filter' => app\models\User::getUserFilters(),
                 'value'=> function ($data){
                    $dh = new DataHelper(); 
                    $value = app\models\User::getUserNames($data->data_manager);
                    $admin = Yii::$app->user->identity->isAdmin();
                    if($admin){
                        $url = Url::to(['data-request/assign','id'=>$data->id],true);
                        $value  = $dh->getModalButton($data, "data-request/assign", "Data Request", 'btn btn-default', $value, $url);

                    }
                     return "<span class='success'>".$value."</span> ";

                 }
             ],
           /*[
                'label'=>'Status',
                'format'=>'raw',
                 'attribute'=>'status',
                 'filter' => app\models\Lookup::getLookupValues("DataStatus"),
                 'value'=> function ($data){
                    return $data->getDataStatus();
                 }
             ],  **/
             [
                'label'=>'Issued',
                'format'=>'raw',
                 'attribute'=>'issued_status',
                 'filter' => app\models\Lookup::getLookupValues("IssuedStatus"),
                 'value'=> function ($data){
                    $dh = new DataHelper(); $link = "";
                    $value = app\models\Lookup::getValue("IssuedStatus", $data->issued_status);
                    $value = $value==""? "Pending":$value;
                    $admin = Yii::$app->user->identity->isAdmin();
                    if($admin == true && $value == "Pending"){
                        $url = Url::to(['data-request/issue','id'=>$data->id],true);
                        $value  = $dh->getModalButton($data, "data-request/issue", "Data Request", 'btn btn-warning', $value, $url);

                    }
                    else if($value == "Done"){
                        $value = "Done (".$data->issued_date.")";
                    }
                     return "<span class='success'>".$value."</span> ";
                 }
             ],
            /* [
                'label'=>'Action',
                'format'=>'raw',
                 'attribute'=>'status',
                 'value'=> function ($data){
                    $link = ''; $link2="";
                    $dh = new DataHelper();
                    $user_id = Yii::$app->user->identity->id;
                    $reviewer = Yii::$app->user->identity->isReviewer();
                    if($reviewer == true && ($user_id != $data->user_id)){
                        $url = Url::to(['data-request/review','id'=>$data->id],true);
                        $link  = $dh->getModalButton($data, "data-request/review", "Project", 'btn btn-warning','Review',$url);

                    }
                    $isApprover = Yii::$app->user->identity->isApprover();
                    if($isApprover == true && ($user_id != $data->user_id)){
                        $url2 = Url::to(['data-request/approve','id'=>$data->id],true);
                        $link2  = $dh->getModalButton($data, "data-request/approve", "Project", 'btn btn-danger','Approve',$url2);
                    }
                    return "&nbsp;".$link."&nbsp;".$link2;
                 }
             ],  
             ***/
            //'date_from',
            //'date_to',
            //'other_info:ntext',
            //'received_date',
            //'reviewed_by',
            //'approved_by',
            //'approved_date',
            //'status_comments:ntext',
            //'feedback:ntext',

             ['class' => 'yii\grid\ActionColumn',
                'template' => '{update}{view}',
                'buttons' => [

                            'update' => function ($url, $model) {
                               
                                $dh = new DataHelper();
                                $url = Url::to(['data-request/update','id'=>$model->id],true);
                                $link  = $dh->getModalButton($model, "data-request/update", "Data Request", 'glyphicon glyphicon-edit','',$url);
                                return "&nbsp;".$link;
                            },
                            'view' => function ($url, $model) {
                                $dh = new DataHelper();
                                $url = Url::to(['data-request/view','id'=>$model->id],true);
                                $link  = $dh->getModalButton($model, "data-request/view", "Data Request", 'glyphicon glyphicon-eye-open','',$url);
                                return "&nbsp;".$link;
                            }
                        ], 
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
