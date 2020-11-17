<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DataRequest */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Data Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="data-request-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'project_id',
            'user_id',
            'data_crfs:ntext',
            'data_variables:ntext',
            'data_sites',
            'date_from',
            'date_to',
            'other_info:ntext',
            'received_date',
            'reviewed_by',
            'approved_by',
            'approved_date',
            'status',
            'status_comments:ntext',
            'feedback:ntext',
        ],
    ]) ?>

</div>
