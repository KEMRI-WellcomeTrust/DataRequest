<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Sibling */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Siblings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sibling-view">

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
            'fk_beneficiary',
            'sibling_names',
            'sibling_dob',
            'sibling_school',
        ],
    ]) ?>

</div>
