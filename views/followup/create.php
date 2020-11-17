<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Followup */

$this->title = 'Create Followup';
$this->params['breadcrumbs'][] = ['label' => 'Followups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="followup-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
