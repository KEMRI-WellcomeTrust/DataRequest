<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\utilities\DataHelper;
use yii\helpers\Url;
use yii\data\ActiveDataProvider;
use app\models\FollowupSearch;
use app\models\Followup;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FollowupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Followups';
?>
<div class="followup-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
        $searchModel = new FollowupSearch();
        $query = Followup::find()->where(['fk_beneficiary'=>$fk_beneficiary]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
    Pjax::begin(['id'=>"pjax-followup"]); ?>

 <p>
       <?php
          $dh = new DataHelper();
            $url = Url::to(['followup/create', 'fk_beneficiary'=>$fk_beneficiary]);
           echo $dh->getModalButton(new \app\models\Followup(), "followup/create", "Followup", 'btn btn-primary pull-right btn-beneficiary','Add Followup',$url);
           ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'followup_date',
            [
               'label'=>'Followup Outcome',
               'format'=>'raw',
                'attribute'=>'followup_outcome',
                'filter' => app\models\Lookup::getLookupValues("Followup Outcome"),
                'value'=> function ($data){
                    return app\models\Lookup::getValue("Followup Outcome", $data->followup_outcome);
                }
            ],
            'followup_outcome_desc:ntext',

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{update}',
            'buttons' => [
                           
                           'update' => function ($url, $model, $keyword) {
                                   $dh = new DataHelper();
                                    $url = Url::to(['//followup/update', 'id'=>$model->id]);
                                return $dh->getModalButton(new \app\models\Lookup(), "//followup/update", "Edit FollowUp", 'glyphicon glyphicon-edit pull-right','',$url);

                           },
                   ], 
           ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
