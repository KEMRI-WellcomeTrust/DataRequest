<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Beneficiary */


$this->params['breadcrumbs'][] = ['label' => 'Beneficiaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="beneficiary-create">

    <?= $this->render('newform', [
        'model' => $model, 'title'=>$this->title = 'New Beneficiary'
    ]) ?>

</div>
