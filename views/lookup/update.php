<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Lookup */

$this->title = 'Update Lookup: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Lookups', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lookup-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
