<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Beneficiary */
/* @var $form yii\widgets\ActiveForm */

use yii\helpers\Url;
use kartik\select2\Select2;
?>
<?php   $id = isset($model->id)?$model->id:0; $keyword = "typeservice"; ?>
<div class="<?= $keyword ?>-form" id="<?= $keyword ?>-form-div-<?= $id ?>">
    <?php  $form = ActiveForm::begin(['id'=> $keyword.'-form-'.$id]); ?>
     <div id="<?= $keyword ?>-form-alert-<?= $id ?>"></div>
    
     <?php  // Usage with ActiveForm and model
        echo $form->field($model, 'rescued_csec')->widget(Select2::classname(), [
            'data' => \app\models\Lookup::getLookupValues('Rescued from CSEC'),
            'options' => ['placeholder' => 'Please Select ...'],
            'pluginOptions' => [
                'allowClear' => true,
                'style'=>'width:250px'
            ],
        ]); 
        
     echo $form->field($model, 'tracing_date')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter tracing date ...'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);  
        ?>

     <?php  // Usage with ActiveForm and model
        echo $form->field($model, 'counseling')->widget(Select2::classname(), [
            'data' => \app\models\Lookup::getLookupValues('Provided with counselling'),
            'options' => ['placeholder' => 'Please Select ...'],
            'pluginOptions' => [
                'allowClear' => true,
                'style'=>'width:250px'
            ],
        ]); 
        echo $form->field($model, 'counseling_date')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter tracing date ...'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd'
        ]
    ]); 
        ?>
  <?php  // Usage with ActiveForm and model
        echo $form->field($model, 'disability_support')->widget(Select2::classname(), [
            'data' => \app\models\Lookup::getLookupValues('Disability Support'),
            'options' => ['placeholder' => 'Please Select ...'],
            'pluginOptions' => [
                'allowClear' => true,
                'style'=>'width:250px'
            ],
        ]); 
        
        ?>
     <?php  // Usage with ActiveForm and model
        echo $form->field($model, 'medical_care')->widget(Select2::classname(), [
            'data' => \app\models\Lookup::getLookupValues('Provided with medical care'),
            'options' => ['placeholder' => 'Please Select ...'],
            'pluginOptions' => [
                'allowClear' => true,
                'style'=>'width:250px'
            ],
        ]); 
        echo $form->field($model, 'medical_care_date')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter tracing date ...'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd'
        ]
    ]); 
        ?>

     <?php  // Usage with ActiveForm and model
        echo $form->field($model, 'legal_support')->widget(Select2::classname(), [
            'data' => \app\models\Lookup::getLookupValues('Provided with legal support'),
            'options' => ['placeholder' => 'Please Select ...'],
            'pluginOptions' => [
                'allowClear' => true,
                'style'=>'width:250px'
            ],
        ]); 
       echo $form->field($model, 'legal_support_date')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter tracing date ...'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);
        ?>

     <?php  // Usage with ActiveForm and model
        echo $form->field($model, 'education_support')->widget(Select2::classname(), [
            'data' => \app\models\Lookup::getLookupValues('Provided with education support'),
            'options' => ['placeholder' => 'Please Select ...'],
            'pluginOptions' => [
                'allowClear' => true,
                'style'=>'width:250px'
            ],
        ]); 
        
        echo $form->field($model, 'educational_support_date')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter tracing date ...'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);
        ?>
     
        <?php  // Usage with ActiveForm and model
        echo $form->field($model, 'accelerated_learning')->widget(Select2::classname(), [
            'data' => \app\models\Lookup::getLookupValues('Accelerated Learning'),
            'options' => ['placeholder' => 'Please Select ...'],
            'pluginOptions' => [
                'allowClear' => true,
                'style'=>'width:250px'
            ],
        ]); 
        
        ?>

     <?php  // Usage with ActiveForm and model
        echo $form->field($model, 'vocational_training')->widget(Select2::classname(), [
            'data' => \app\models\Lookup::getLookupValues('Provided with vocational training'),
            'options' => ['placeholder' => 'Please Select ...'],
            'pluginOptions' => [
                'allowClear' => true,
                'style'=>'width:250px'
            ],
        ]); 
        
        echo $form->field($model, 'vocational_training_date')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter tracing date ...'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);
        ?>

     <?php  // Usage with ActiveForm and model
        echo $form->field($model, 'empl_voc_training')->widget(Select2::classname(), [
            'data' => \app\models\Lookup::getLookupValues('Legal employment after vocational training'),
            'options' => ['placeholder' => 'Please Select ...'],
            'pluginOptions' => [
                'allowClear' => true,
                'style'=>'width:250px'
            ],
        ]); 
        
        echo $form->field($model, 'empl_voc_training_date')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter tracing date ...'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);
        ?>

     <?php  // Usage with ActiveForm and model
        echo $form->field($model, 'provided_income')->widget(Select2::classname(), [
            'data' => \app\models\Lookup::getLookupValues('Provided with income generating support'),
            'options' => ['placeholder' => 'Please Select ...'],
            'pluginOptions' => [
                'allowClear' => true,
                'style'=>'width:250px'
            ],
        ]); 
        
        echo $form->field($model, 'provided_income_date')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter date ...'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);
        ?>

     <?php  // Usage with ActiveForm and model
        echo $form->field($model, 'family_counseling')->widget(Select2::classname(), [
            'data' => \app\models\Lookup::getLookupValues("Family Counseling"),
            'options' => ['placeholder' => 'Please Select ...'],
            'pluginOptions' => [
                'allowClear' => true,
                'style'=>'width:250px'
            ],
        ]); 
        
        echo $form->field($model, 'familty_counseling_date')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter date ...'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);
        ?>
      <?php  // Usage with ActiveForm and model
        echo $form->field($model, 'parenting_skills_training')->widget(Select2::classname(), [
            'data' => \app\models\Lookup::getLookupValues("Parenting Skills Training"),
            'options' => ['placeholder' => 'Please Select ...'],
            'pluginOptions' => [
                'allowClear' => true,
                'style'=>'width:250px'
            ],
        ]); 
        ?>

     <?php  // Usage with ActiveForm and model
        echo $form->field($model, 'family_training')->widget(Select2::classname(), [
            'data' => \app\models\Lookup::getLookupValues('Family Training'),
            'options' => ['placeholder' => 'Please Select ...'],
            'pluginOptions' => [
                'allowClear' => true,
                'style'=>'width:250px'
            ],
        ]); 
        
        echo $form->field($model, 'family_training_date')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter date ...'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);
        ?>
     <?php  // Usage with ActiveForm and model
        echo $form->field($model, 'family_income')->widget(Select2::classname(), [
            'data' => \app\models\Lookup::getLookupValues('Family Income'),
            'options' => ['placeholder' => 'Please Select ...'],
            'pluginOptions' => [
                'allowClear' => true,
                'style'=>'width:250px'
            ],
        ]); 
        
        echo $form->field($model, 'family_income_date')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter date ...'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);
        ?>
     
     <?= $form->field($model, 'comments')->textArea(['cols'=>20,'rows'=>5]) ?>

<div class="form-group">
         <?php $url =  Url::to(['beneficiary/update','id'=>$model->id, 'keyword'=>$keyword]); ?>
        <?= Html::submitButton('Save', ['class' =>'btn btn-success btn-create','onclick'=>"ajaxFormSubmit('$url','$keyword-form-div-$id','$keyword-form-$id',1); return false;"]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>