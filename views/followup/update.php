<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Followup */

$this->title = 'Update Followup: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Followups', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="followup-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
