<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\export\ExportMenu;
/* @var $this yii\web\View */
/* @var $searchModel app\models\BeneficiarySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Beneficiaries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-info chain-users-index">

    <div class="panel-heading">
          <h3><?php
            if($id==0){
                echo "New Beneficiary";
                $model = new \app\models\Beneficiary();
            }  
            else{
                echo \app\models\Beneficiary::getNames($id);
                //echo \app\models\Beneficiary::getNames($id);
                $model = \app\models\Beneficiary::find()->where(['id'=>$id])->one();
            }
            
          ?></h3>
      </div>
        <div class="panel-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item active"><a class="nav-link active" data-toggle="tab" href="#generalinfo" role="tab">General Information</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#siblings" role="tab"> Siblings </a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#childlabourtriggers" role="tab">CSEC triggers</a></li>
                <?php 
               echo Yii::$app->user->identity->designation == 4 || Yii::$app->user->identity->isAdmin() ?<<<HERE
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#typeservice" role="tab">Services</a></li>
HERE
                :"";  ?>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#maincare" role="tab">Main Care</a></li> 
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#communitysupport" role="tab">Community Support</a></li> 
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#followup" role="tab">Follow up</a></li> 
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#finaloutcome" role="tab">Final Outcome</a></li> 
               <!-- <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#projectstaff" role="tab">Project staff information</a></li> -->
            </ul>
            
            <div class="tab-content">
                <div class="tab-pane active" id="generalinfo" role="tabpanel">
                    <?php

                       echo Yii::$app->controller->renderPartial("generalinfo", [
                            'model'=>$model
                        ]); ?>
                  </div>
                <div class="tab-pane" id="siblings" role="tabpanel">
                    <?php

                       echo Yii::$app->controller->renderPartial("//sibling/index", [
                            'fk_beneficiary'=>$model->id
                        ]); ?>
                  </div>
                <div class="tab-pane" id="childlabourtriggers" role="tabpanel">
                    <?php

                       echo Yii::$app->controller->renderPartial("childlabourtriggers", [
                            'model'=>$model
                        ]); ?>
                  </div>
                <div class="tab-pane" id="typeservice" role="tabpanel">
                    <?php

                       echo Yii::$app->controller->renderPartial("typeservice", [
                            'model'=>$model
                        ]); ?>
                  </div>
                <div class="tab-pane" id="maincare" role="tabpanel">
                    <?php

                       echo Yii::$app->controller->renderPartial("maincare", [
                            'model'=>$model
                        ]); ?>
                  </div>
                <div class="tab-pane" id="communitysupport" role="tabpanel">
                    <?php

                       echo Yii::$app->controller->renderPartial("communitysupport", [
                            'model'=>$model
                        ]); ?>
                  </div>
                <div class="tab-pane" id="followup" role="tabpanel">
                    <?php

                       echo Yii::$app->controller->renderPartial("//followup/index", [
                            'fk_beneficiary'=>$model->id
                        ]); ?>
                  </div>
                <div class="tab-pane" id="finaloutcome" role="tabpanel">
                    <?php

                       echo Yii::$app->controller->renderPartial("finaloutcome", [
                            'model'=>$model
                        ]); ?>
                  </div>
                <div class="tab-pane" id="projectstaff" role="tabpanel">
                    <?php

                       echo Yii::$app->controller->renderPartial("projectstaff", [
                            'model'=>$model
                        ]); ?>
                  </div>
                
            </div>
            
            
            
        </div>
</div>
