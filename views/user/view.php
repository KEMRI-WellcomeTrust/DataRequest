<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode(\app\models\User::getUserNames($model->id)) ?></h1>
    <?php
        $dh = new \app\utilities\DataHelper();
        $url = Url::to(['setpass','id'=>$model->id]);
        echo $dh->getModalButton($model, "user/setpass", "User", 'btn btn-warning btn-sm pull-right','Set Password',$url,'User');
    ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'fname',
            'mname',
            'lname',
            [
               'label'=> 'designation',
               'value' => function($data){
                   return \app\models\Lookup::getValue("Staff Designation", $data->designation);
               }
            ]
        ],
    ]) ?>

</div>
