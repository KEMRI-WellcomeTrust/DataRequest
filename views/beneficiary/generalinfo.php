<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Beneficiary */
/* @var $form yii\widgets\ActiveForm */

use yii\helpers\Url;
?>
<?php   $id = isset($model->id)?$model->id:0; $keyword = "generalinfo"; ?>
<div class="<?= $keyword ?>-form" id="<?= $keyword ?>-form-div-<?= $id ?>">
    <?php  $form = ActiveForm::begin(['id'=> $keyword.'-form-'.$id]); ?>
     <div id="<?= $keyword ?>-form-alert-<?= $id ?>"></div>
     
<div class="beneficiary-form-1">
    <?= $form->field($model, 'fname')->textInput(['style'=>'width:250px']) ?>

    <?= $form->field($model, 'mname')->textInput(['style'=>'width:250px']) ?>

    <?= $form->field($model, 'lname')->textInput(['style'=>'width:250px']) ?>
    
    <?= $form->field($model, 'child_age')->textInput(['style'=>'width:250px']) ?>
    
    <?= $form->field($model, 'dob')->textInput(['style'=>'width:250px']) ?>
    
        <?php  // Usage with ActiveForm and model
        echo $form->field($model, 'org_id')->widget(Select2::classname(), [
            'data' => \app\models\Lookup::getLookupValues('Organization Name'),
            'options' => ['placeholder' => 'Please Select ...', 'style'=>'width:250px'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); 
        ?>

    <?= $form->field($model, 'date_intake')->textInput(['style'=>'width:250px']) ?>

    <?= $form->field($model, 'unique_id')->textInput(['style'=>'width:250px']) ?>
    
    <?= $form->field($model, 'parent_guard_names')->textInput(['style'=>'width:250px']) ?>
    
    <?php  // Usage with Acti    <?php  // Usage with ActiveForm and model
    echo $form->field($model, 'parent_guard_relationship')->widget(Select2::classname(), [
        'data' => \app\models\Lookup::getLookupValues('Parent Relationship'),
        'options' => ['placeholder' => 'Please Select ...', 'style'=>'width:250px'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); 
    ?>
    <?= $form->field($model, 'parent_guard_id')->textInput(['style'=>'width:250px']) ?>
    <?= $form->field($model, 'parent_guard_contacts')->textInput(['style'=>'width:250px']) ?>
    
    <?php  // Usage with ActiveForm and model
        echo $form->field($model, 'parent_vital_status')->widget(Select2::classname(), [
            'data' => \app\models\Lookup::getLookupValues('Parent Vital Status'),
            'options' => ['placeholder' => 'Please Select ...', 'style'=>'width:250px'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); 
        ?>

    <?php  // Usage with ActiveForm and model
        echo $form->field($model, 'child_status')->widget(Select2::classname(), [
            'data' => \app\models\Lookup::getLookupValues('Child Status'),
            'options' => ['placeholder' => 'Please Select ...', 'style'=>'width:250px'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); 
        ?>
 
</div>
<div class="beneficiary-form-2">
    <?php  // Usage with ActiveForm and model
        echo $form->field($model, 'intake_quarter')->widget(Select2::classname(), [
            'data' => \app\models\Lookup::getLookupValues('Quarter'),
            'options' => ['placeholder' => 'Please Select ...'],
            'pluginOptions' => [
                'allowClear' => true,
                'style'=>'width:250px'
            ],
        ]); 
        ?>
    <?php  // Usage with ActiveForm and model
        echo $form->field($model, 'school_status')->widget(Select2::classname(), [
            'data' => \app\models\Lookup::getLookupValues('School Status'),
            'options' => ['placeholder' => 'Please Select ...'],
            'pluginOptions' => [
                'allowClear' => true,
                'style'=>'width:250px'
            ],
        ]); 
        ?>
    <?= $form->field($model, 'school_name')->textInput(['style'=>'width:250px']) ?>
    
    <?php  // Usage with ActiveForm and model
        echo $form->field($model, 'level_education')->widget(Select2::classname(), [
            'data' => \app\models\Lookup::getLookupValues('Level Education'),
            'options' => ['placeholder' => 'Please Select ...'],
            'pluginOptions' => [
                'allowClear' => true,
                'style'=>'width:250px'
            ],
        ]); 
        ?>
    <?php  // Usage with ActiveForm and model
        echo $form->field($model, 'gender')->widget(Select2::classname(), [
            'data' => \app\models\Lookup::getLookupValues('Gender'),
            'options' => ['placeholder' => 'Please Select ...'],
            'pluginOptions' => [
                'allowClear' => true,
                'style'=>'width:250px'
            ],
        ]); 
        ?>
    
    <?php  // Usage with ActiveForm and model
        echo $form->field($model, 'disability')->widget(Select2::classname(), [
            'data' => \app\models\Lookup::getLookupValues('Disability'),
            'options' => ['placeholder' => 'Please Select ...'],
            'pluginOptions' => [
                'allowClear' => true,
                'style'=>'width:250px'
            ],
        ]); 
        ?>
    <?php  // Usage with ActiveForm and model
        echo $form->field($model, 'disability_type')->widget(Select2::classname(), [
            'data' => \app\models\Lookup::getLookupValues('Type of disability'),
            'options' => ['placeholder' => 'Please Select ...'],
            'pluginOptions' => [
                'allowClear' => true,
                'style'=>'width:250px'
            ],
        ]); 
        ?>
      <?= $form->field($model, 'disability_type_specify')->textInput(['style'=>'width:250px']) ?>
    

    <?php  // Usage with ActiveForm and model
        echo $form->field($model, 'county')->widget(Select2::classname(), [
            'data' => \app\models\Lookup::getLookupValues('County'),
            'options' => ['placeholder' => 'Please Select ...'],
            'pluginOptions' => [
                'allowClear' => true,
                'style'=>'width:250px'
            ],
        ]); 
        ?>

    <?php  // Usage with ActiveForm and model
        echo $form->field($model, 'subcounty')->widget(Select2::classname(), [
            'data' => \app\models\Lookup::getLookupValues('Sub-county'),
            'options' => ['placeholder' => 'Please Select ...'],
            'pluginOptions' => [
                'allowClear' => true,
                'style'=>'width:250px'
            ],
        ]); 
        ?>

    <?= $form->field($model, 'location')->textInput(['style'=>'width:250px']) ?>

    <?= $form->field($model, 'village')->textInput(['style'=>'width:250px']) ?>

        <?php  // Usage with ActiveForm and model
        echo $form->field($model, 'subcounty_office')->widget(Select2::classname(), [
            'data' => \app\models\Lookup::getLookupValues('Sub-county office'),
            'options' => ['placeholder' => 'Please Select ...'],
            'pluginOptions' => [
                'allowClear' => true,
                'style'=>'width:250px'
            ],
        ]); 
        ?>
    
    <?= $form->field($model, 'refer_agency')->textInput(['style'=>'width:250px']) ?>
    
    
<div class="form-group">
         <?php $url =  Url::to(['beneficiary/update','id'=>$model->id, 'keyword'=>$keyword]); ?>
        <?= Html::submitButton('Save', ['class' =>'btn btn-success btn-create','onclick'=>"ajaxFormSubmit('$url','$keyword-form-div-$id','$keyword-form-$id',1); return false;"]) ?>
    </div>
    
</div>

<?php ActiveForm::end(); ?>
</div>