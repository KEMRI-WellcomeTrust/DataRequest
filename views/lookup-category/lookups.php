<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\LookupSearch;
use app\models\Lookup;
use yii\helpers\Url;
use app\utilities\DataHelper;
use yii\data\ActiveDataProvider;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FollowupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Options';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lookup-index">
    <?php
        $searchModel = new LookupSearch();
        $query = Lookup::find()->where(['fk_category'=>$fk_category]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
    ?>
    <h3><?= Html::encode($this->title) ?></h3>
    <?php Pjax::begin(['id'=>"pjax-lookup-$fk_category"]); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
       <?php
           $dh = new DataHelper();
            $url = Url::to(['//lookup/create', 'fk_category'=>$fk_category]);
           echo $dh->getModalButton(new \app\models\Lookup(), "//lookup/create", "Add Option", 'btn btn-primary pull-right btn-beneficiary','Add Option',$url);
           ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            ['label'=>'Category',
               'format'=>'raw',
                'attribute'=>'fk_category',
                'filter' => app\models\LookupCategory::getFilters(),
                'value'=> function ($data){
                    if(isset($data->fkCategory)){
                        return $data->fkCategory->category_name;
                    }
                    else{
                        return '';
                    }
                }
            ],
            'key',
            'value',
            ['class' => 'yii\grid\ActionColumn',
            'template' => '{update}',
            'buttons' => [
                           
                           'update' => function ($url, $model, $keyword) {
                                   $dh = new DataHelper();
                                    $url = Url::to(['//lookup/update', 'id'=>$model->id]);
                                return $dh->getModalButton(new \app\models\Lookup(), "//lookup/update", "Edit Option", 'glyphicon glyphicon-edit pull-right','',$url);

                           },
                   ], 
           ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>