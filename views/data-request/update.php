<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DataRequest */

$this->title = 'Update Data Request: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Data Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="data-request-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>