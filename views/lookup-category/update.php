<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LookupCategory */

$this->title = 'Update Lookup Category: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Lookup Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lookup-category-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
