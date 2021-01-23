<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectUser */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Project Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?> 
<div class="project-user-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            [                      
                'label' => 'Affiliation',
                'value' => Lookup::getValue("Affiliation", $model->affiliation),
            ],
            [                      
                'label' => 'Role',
                'value' => Lookup::getValue("Role", $model->role),
            ],
            
        ],
    ]) ?>

</div>
