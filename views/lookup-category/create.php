<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LookupCategory */

$this->title = 'Create Question Category';
$this->params['breadcrumbs'][] = ['label' => 'Lookup Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lookup-category-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
