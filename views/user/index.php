<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\utilities\DataHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-info chain-users-index">
      <div class="panel-heading"><h3><?= Html::encode($this->title) ?></h3></div>
      <div class="panel-body row">
          <div class="left-sidebar">
                 <?php
      
      $ranges = [
               '300000'=>Html::a('Users',['user/index']), 
               '200000'=>Yii::$app->user->identity->isSysAdmin()?Html::a('Question Options',['lookup/index']):''
               ];
      echo "<ul class='list-group'>";
      foreach($ranges as $key => $range){
          
          echo "<li class='list-group-item'>".$range."</li>";
      }
      echo "<ul>";
      ?>
          </div>
          <div class="right-sidebar">
              
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse0">
                            Manage Users
                        </a>
                      
                    </h4>
                  </div>
                    <?php Pjax::begin(['id'=>"pjax-user"]); ?>
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <p>
                       <?php
                          $dh = new DataHelper();
                            $url = Url::to(['user/create', 'id'=>0]);
                           echo $dh->getModalButton(new \app\models\User(), "user/create", "User", 'btn btn-primary pull-right btn-beneficiary','Add User',$url);
                           ?>
                    </p>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'username',
                            'fname',
                            'mname',
                            'lname',
                            'email',
                            //'designation',
                            [
                                'label'=>'Set Pass',
                                'format'=>'raw',
                                 'attribute'=>'setpass',
                                 'value'=> function ($data){
                                     $dh = new \app\utilities\DataHelper();
                                        $url = Url::to(['setpass','id'=>$data->id]);
                                     return $dh->getModalButton($data, "user/setpass", "User", 'btn btn-warning btn-sm','Set Password',$url,'User');
                                 }
                             ],
                            ['class' => 'yii\grid\ActionColumn',
                            'template' => '{update}',
                            'buttons' => [

                                           'update' => function ($url, $model, $keyword) {
                                                   $dh = new DataHelper();
                                                    $url = Url::to(['//user/update', 'id'=>$model->id]);
                                                return $dh->getModalButton(new \app\models\Lookup(), "//user/update", "Edit User", 'glyphicon glyphicon-edit pull-right','',$url);

                                           },
                                   ], 
                           ],
                        ],
                    ]); ?>
                    <?php Pjax::end(); ?>
                </div>
          </div>
      </div>
</div>