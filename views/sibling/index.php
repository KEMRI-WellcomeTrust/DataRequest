<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\utilities\DataHelper;
use yii\helpers\Url;
use yii\data\ActiveDataProvider;
use app\models\SiblingSearch;
use app\models\Sibling;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SiblingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Siblings';

?>
<div class="sibling-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
        $searchModel = new SiblingSearch();
        $query = Sibling::find()->where(['fk_beneficiary'=>$fk_beneficiary]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
    Pjax::begin(['id'=>"pjax-sibling"]); ?>

 <p>
       <?php
          $dh = new DataHelper();
            $url = Url::to(['sibling/create', 'fk_beneficiary'=>$fk_beneficiary]);
           echo $dh->getModalButton(new \app\models\Sibling(), "sibling/create", "Sibling", 'btn btn-primary pull-right btn-beneficiary','Add Sibling',$url);
           ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            //'fk_beneficiary',
            'sibling_names',
            'sibling_dob',
            'sibling_school',

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{update}',
            'buttons' => [
                           
                           'update' => function ($url, $model, $keyword) {
                                   $dh = new DataHelper();
                                    $url = Url::to(['//sibling/update', 'id'=>$model->id]);
                                return $dh->getModalButton(new \app\models\Lookup(), "//sibling/update", "Edit Sibling", 'glyphicon glyphicon-edit pull-right','',$url);

                           },
                   ], 
           ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
