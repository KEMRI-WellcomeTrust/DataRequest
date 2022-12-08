<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Progress */

$this->title = 'Update Progress: ' . $model->title;

?>
<div class="progress-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
