<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\utilities\DataHelper;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\LookupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Settings';
#$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lookup-index">
<div class="panel panel-info chain-users-index">
      <div class="panel-heading"><h3><?= Html::encode($this->title) ?></h3></div>
      <div class="panel-body row">
          <div class="left-sidebar">
                 <?php
      
      $ranges = [
                  '300000'=>Html::a('Users',['user/index']), 
                  '200000'=>Yii::$app->user->identity->isSysAdmin()? Html::a('Question Options',['lookup/index']):''
               ];
      echo "<ul class='list-group'>";
      foreach($ranges as $key => $range){
          
          echo "<li class='list-group-item'>".$range."</li>";
      }
      echo "<ul>";
      ?>
          </div>
          <div class="right-sidebar">
              
               <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse0">
                            Question Options
                        </a>
                      
                    </h4>
                  </div>
                  <div id="collapse0" class="panel-collapse collapse in">
                      <div class="panel-body">
                          <span class="col-8">
                              Collapse down the questions to add/edit answer options.
                          </span>
                          <span class="col-4">
                              <?php
                                $dh = new DataHelper();
                                  $url = Url::to(['lookup-category/create']);
                                 echo $dh->getModalButton(new \app\models\Beneficiary(), "lookup-category/create", "LookupCategory", 'btn btn-primary pull-right btn-beneficiary','Add Question Category',$url);
                                ?>
                          </span>
                          
                      </div>
                  </div>
                </div>
                <?php
                  $models = \app\models\LookupCategory::find()->all();
                  $output = "";
                  if($models){
                      foreach($models as $model){
                       //get gridview for lookups of this category.
                       $grid = Yii::$app->controller->renderPartial('//lookup-category/lookups',['fk_category'=>$model->id],true);
                        $output .=<<<DOC
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse$model->id">
                            $model->category_name </a>
                          </h4>
                        </div>
                        <div id="collapse$model->id" class="panel-collapse collapse">
                          <div class="panel-body">
                             $grid
                         </div>
                        </div>
                    </div>
DOC;
                        
                      }
                   echo $output;
                  }
                ?>
                
                
              </div> 
              
          </div>
            
            
          </div>

      </div>
   </div>
</div>
