<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Project */

$this->title = $model->project_name;
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="project-view">
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn pull-right btn-primary']) ?>
        
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'project_name',
            'project_desc:ntext',
            'project_aims:ntext',
            'request_type',
            'type_data',
            'proposal_type',
            'date_submitted',
            'date_review',
            'irb_other_approval',
            'sap:ntext',
            'pub_plan:ntext',
            'target_completion_date',
            'milestones:ntext',
            'user_id',
            'request_status',
            'request_approved_by',
            'request_reviewed_by',
        ],
    ]) ?>

</div>
