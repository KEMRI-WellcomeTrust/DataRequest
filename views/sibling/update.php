<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sibling */

$this->title = 'Update Sibling: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Siblings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sibling-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
