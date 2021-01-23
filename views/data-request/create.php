<?php

use yii\helpers\Html;
use app\models\Project;

/* @var $this yii\web\View */
/* @var $model app\models\DataRequest */

?>
<div class="data-request-create">
    <?php
        $project = Project::find()->where(['id' => $model->project_id])->one();
        if($project){
            $model->user_id = $project->user_id;
        }
    ?>
    <?= $this->render('_form', [
        'model' => $model
    ]) ?>

</div>
