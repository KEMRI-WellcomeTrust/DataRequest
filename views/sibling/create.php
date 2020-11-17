<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Sibling */

$this->title = 'Create Sibling';
$this->params['breadcrumbs'][] = ['label' => 'Siblings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sibling-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
