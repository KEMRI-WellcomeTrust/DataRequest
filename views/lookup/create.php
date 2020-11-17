<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Lookup */

$this->title = 'Create Lookup';
$this->params['breadcrumbs'][] = ['label' => 'Lookups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lookup-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
