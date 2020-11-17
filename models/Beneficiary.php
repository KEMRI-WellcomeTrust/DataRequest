<?php

namespace app\models;

use Yii;
use app\models\Lookup;

/**
 * This is the model class for table "{{%csec_beneficiary}}".
 *
 * @property int $id ID
 * @property string $fname First Name
 * @property string $mname Middle Name
 * @property string $lname Last Name
 * @property string $date_intake Date of Case intake
 * @property int $child_age
 * @property string $dob
 * @property string $intake_quarter
 * @property string $unique_id Unique identifier
 * @property string $child_status Vulnerable or Exploited (choose one)
 * @property string $gender Gender
 * @property string $disability Child With Disability
 * @property int $disability_type Type of disability
 * @property int $county County
 * @property int $subcounty Sub-county
 * @property int $location Location
 * @property int $village Village 
 * @property int $school_status School
 * @property int $school_name School Name
 * @property int $level_education Level Education
 * @property string $subcounty_office Name of Sub-county children office identifying child (when applicable)
 * @property string $refer_agency Name of referring agency (school, NGO, FBO, DCO, etc.)
 * @property int $type_csec Type of CSEC
 * @property string $type_csec_specify Specify
 * @property int $cause_csec Reported causes of child's involvement in CSEC
 * @property string $cause_csec_specify Specify
 * @property string $activity_desc Description of CSEC Activity
 * @property string $rescued_csec Rescued from CSEC
 * @property string $tracing_date Tracing Conducted On (Date)
 * @property int $counseling Provided with counselling
 * @property string $counseling_date Date Provided Counselling
 * @property int $medical_care Provided with medical care
 * @property string $medical_care_date Medical Care Date
 * @property int $legal_support Provided with legal support
 * @property string $legal_support_date Legal Support Date
 * @property int $education_support Provided with education support
 * @property string $educational_support_date Educational Support Date
 * @property int $vocational_training Provided with vocational training
 * @property string $vocational_training_date Vocational Training Date
 * @property int $empl_voc_training Provided with legal employment after vocational training
 * @property string $empl_voc_training_date Employment After Vocational Training Date
 * @property int $provided_income Provided with kitty for income generating support
 * @property string $provided_income_date Date Provided Income Kitty
 * @property string $parent_guard_names Name of parent/guardian of child
 * @property string $parent_guard_contacts Contacts For Parent/Guardian
 * @property int $family_counseling Provided  Child's family with counselling
 * @property string $familty_counseling_date Date of Family Counselling
 * @property int $family_training Provided  Child's family with training on IGA
 * @property string $family_training_date Date of Family Training
 * @property int $family_income Provided  Child's family with income generating kitty
 * @property int $family_income_date Date of Family Income
 * @property int $main_care_arrangement Main care arrangement provided to CSEC beneficiary
 * @property int $main_care_specify Specify
 * @property int $main_care_agency Name of agency child has been referred to (when applicable)
 * @property int $main_support_provider Main Persons, groups and/or institutions in the community that has provided support to the child
 * @property string $main_support_provider_specify Specify
 * @property string $comm_contact_person Community Contact Person
 * @property int $comm_contact_person_position Community Contact Person Position
 * @property string $comm_contact_person_pos_specify Specify
 * @property string $comm_contact_person_tel Community Contact Person Telephone
 * @property int $risk_level Child's risk level
 * @property int $followup_visit Child's follou up visits
 * @property int $case_final_result Child's case final result
 * @property int $cause_failure Main cause of failure (when applicable)
 * @property string $cause_failure_specify Specify
 * @property int $cause_success Main cause of success (when applicable)
 * @property string $cause_success_specify Specify
 * @property string $data_entry_staff Name of person uploading information on database
 * @property int $data_entry_staff_designation Designation of person uploading information on database
 * @property string $date_created Date Created
 * @property string $date_modified Date Modified
 * @property int $created_by Created By
 * @property int $modified_by Modified By
 * @property int $modified_by Modified By
 * @property int $parent_vital_status Parent Vital Status
 * @property int $org_id org id
 * @property int $disability_support Disability Support
 * 
 * @property int $accelerated_learning Accelerated Learning
 * @property int $parent_guard_relationship Relationship with the child
 * @property int $parent_guard_id Parent/Guardian's ID number
 * @property int $parenting_skills_training Training on positive parenting skills 
 * @property int $flag_delete
 * 
 * @property CsecUser $createdBy
 * @property CsecUser $modifiedBy
 * @property CsecFollowup[] $csecFollowups
 * @property CsecSibling[] $csecSiblings
 */
class Beneficiary extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%csec_beneficiary}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fname', 'lname','unique_id', 'org_id'], 'required'],
            [['date_intake'],'date', 'format'=>"yyyy-mm-dd"],
            [['date_intake', 'tracing_date', 'counseling_date', 'medical_care_date', 'legal_support_date', 'educational_support_date', 'vocational_training_date', 'empl_voc_training_date', 'provided_income_date', 'familty_counseling_date', 'family_training_date','family_income_date', 'date_created', 'date_modified'], 'safe'],
            [['child_age','disability_type', 'county', 'subcounty', 'school_status', 'level_education',  'counseling', 'medical_care', 'legal_support', 'education_support', 'vocational_training', 'empl_voc_training', 'provided_income', 'family_counseling', 'family_training', 'family_income', 'main_support_provider', 'comm_contact_person_position', 'risk_level', 'followup_visit', 'case_final_result', 'cause_failure', 'cause_success', 'data_entry_staff_designation', 'created_by', 'modified_by','parent_vital_status', 'org_id', 'flag_delete'], 'integer'],
            [['dob','activity_desc', 'parent_guard_contacts', 'location', 'village','main_care_specify'], 'string'],
            [['fname', 'mname', 'lname', 'subcounty_office', 'refer_agency', 'type_csec_specify', 'cause_csec_specify', 'rescued_csec', 'comm_contact_person_tel', 'data_entry_staff'], 'string', 'max' => 100],
            [['unique_id', 'intake_quarter'], 'string', 'max' => 50],
            [['accelerated_learning','parent_guard_relationship', 'parent_guard_id', 'parenting_skills_training', 'disability_support'], 'integer'],
            [['child_status'], 'string', 'max' => 20],
            [['gender'], 'string', 'max' => 10],
            [['disability'], 'string', 'max' => 5],
            [['type_csec', 'cause_csec','main_care_arrangement', 'school_name','comments'],'safe'],
            [['parent_guard_names', 'main_support_provider_specify', 'comm_contact_person', 'comm_contact_person_pos_specify', 'cause_failure_specify', 'cause_success_specify','disability_type_specify','main_care_agency'], 'string', 'max' => 200],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['modified_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['modified_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'org_id' => 'Organization',
            'fname' => 'First Name',
            'mname' => 'Middle Name',
            'lname' => 'Last Name',
            'child_age' => 'Child Age',
            'dob' => 'Date of Birth',
            'intake_quarter' => 'Quarter of joining the project',
            'date_intake' => 'Date of Case intake',
            'unique_id' => 'Unique identifier',
            'child_status' => 'Vulnerable or Exploited (choose one)',
            'gender' => 'Gender',
            'disability' => 'Child With Disability',
            'disability_type' => 'Type of disability',
            'disability_type_specify' => "Specify",
            'disability_support' => "Disability Support",
            'county' => 'County',
            'subcounty' => 'Sub-county',
            'location' => 'Location',
            'village' => 'Village',
            'school_status' => 'In-school/Out of school', 
            'school_name' => 'School/Education institution', 
            'level_education' => 'Class/Level of education',
            'subcounty_office' => 'Name of Sub-county children office identifying child (when applicable)',
            'refer_agency' => 'Name of referring agency (school, NGO, FBO, DCO, etc.)',
            'type_csec' => 'Type of CSEC',
            'type_csec_specify' => 'Specify',
            'cause_csec' => 'Reported causes of child\'s involvement in CSEC',
            'cause_csec_specify' => 'Specify',
            'main_care_arrangement' => "Main Care",
            'activity_desc' => 'Description of CSEC Activity',
            'rescued_csec' => 'Rescued from CSEC',
            'tracing_date' => 'Tracing Conducted On (Date)',
            'counseling' => 'Provided with counselling',
            'counseling_date' => 'Date Provided Counselling',
            'medical_care' => 'Provided with medical care',
            'medical_care_date' => 'Medical Care Date',
            'legal_support' => 'Provided with legal support',
            'legal_support_date' => 'Legal Support Date',
            'education_support' => 'Provided with education support',
            'educational_support_date' => 'Educational Support Date',
            'vocational_training' => 'Provided with vocational training',
            'vocational_training_date' => 'Vocational Training Date',
            'empl_voc_training' => 'Provided with legal employment after vocational training',
            'empl_voc_training_date' => 'Employment After Vocational Training Date',
            'provided_income' => 'Provided with kitty for income generating support',
            'provided_income_date' => 'Date Provided Income Kitty',
            'parent_guard_names' => 'Name of parent/guardian of child',
            'parent_guard_contacts' => 'Contacts For Parent/Guardian',
            'parent_vital_status' => "Parents Vital Status",
            'accelerated_learning' => "Accelerated Learning",
            'parent_guard_relationship' => "Relationship with the child", 
            'parent_guard_id' => "Parent/Guardian's ID number",
            'family_counseling' => 'Provided  Child\'s family with counselling',
            'familty_counseling_date' => 'Date of Family Counselling',
            'family_training' => 'Provided  Child\'s family with training on IGA',
            'family_training_date' => 'Date of Family Training',
            'family_income' => 'Provided  Child\'s family with income generating kitty',
            'family_income_date' => 'Date of Family Income',
            'parenting_skills_training' => 'Training on positive parenting skills',
            'main_care_arrangement' => 'Main care arrangement provided to CSEC beneficiary',
            'main_care_specify' => 'Specify',
            'main_care_agency' => 'Name of agency child has been referred to (when applicable)',
            'main_support_provider' => 'Main Persons, groups and/or institutions in the community that has provided support to the child',
            'main_support_provider_specify' => 'Specify',
            'comm_contact_person' => 'Community Contact Person',
            'comm_contact_person_position' => 'Community Contact Person Position',
            'comm_contact_person_pos_specify' => 'Specify',
            'comm_contact_person_tel' => 'Community Contact Person Telephone',
            'risk_level' => 'Child\'s risk level',
            'followup_visit' => 'Child\'s follou up visits',
            'case_final_result' => 'Child\'s case final result',
            'cause_failure' => 'Main cause of failure (when applicable)',
            'cause_failure_specify' => 'Specify',
            'cause_success' => 'Main cause of success (when applicable)',
            'cause_success_specify' => 'Specify',
            'data_entry_staff' => 'Name of person uploading information on database',
            'data_entry_staff_designation' => 'Designation of person uploading information on database',
            'date_created' => 'Date Created',
            'date_modified' => 'Date Modified',
            'created_by' => 'Created By',
            'modified_by' => 'Modified By',
            'flag_delete' => "Do you really want to delete?"
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(CsecUser::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModifiedBy()
    {
        return $this->hasOne(CsecUser::className(), ['id' => 'modified_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCsecFollowups()
    {
        return $this->hasMany(CsecFollowup::className(), ['fk_beneficiary' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCsecSiblings()
    {
        return $this->hasMany(CsecSibling::className(), ['fk_beneficiary' => 'id']);
    }
    public function beforeValidate() {
        
        if($this->date_intake){
            $this->date_intake = date("Y-m-d", strtotime($this->date_intake));
        }
        if(is_array($this->type_csec)){
            $this->customValidationsWithArray("type_csec", "type_csec_specify", 8, "Specify type of CSEC");
            $this->type_csec = implode(",", $this->type_csec);
        }
        if(is_array($this->cause_csec)){
            $this->customValidationsWithArray("cause_csec", "cause_csec_specify", 8, "Specify cause");
            $this->cause_csec = implode(",", $this->cause_csec);
        }
        if(is_array($this->main_care_arrangement)){
            
            $this->customValidationsWithArray("main_care_arrangement", "main_care_specify", 8, "Specify main care arrangement");
            
            $this->main_care_arrangement = implode(",", $this->main_care_arrangement);
        }
        #some custom validations here.
        $this->customValidations("rescued_csec", "tracing_date",1,"Tracing Date Required");
        $this->customValidations("counseling", "counseling_date",1,"Counselling date required");
        $this->customValidations("medical_care", "medical_care_date",1,"Medical care date required");
        $this->customValidations("legal_support", "legal_support_date",1,"Legal support date required");
        $this->customValidations("education_support", "educational_support_date",1,"Date of education support required.");
        $this->customValidations("vocational_training", "vocational_training_date",1,"Vocational Training Date required");
        $this->customValidations("empl_voc_training", "empl_voc_training_date",1,"Date of employment offered required");
        $this->customValidations("provided_income", "provided_income_date",1,"Date of income provided required");
        $this->customValidations("family_counseling", "familty_counseling_date",1,"Date of family counseling required");
        $this->customValidations("family_training", "family_training_date",1,"Date of family training required");
        $this->customValidations("family_income", "family_income_date",1,"Family income date required");
        
        $this->customValidations("main_support_provider", "main_support_provider_specify",14,"specify main support provider");
        $this->customValidations("comm_contact_person_position", "comm_contact_person_pos_specify",14,"contact person position required");
        $this->customValidations("cause_failure", "cause_failure_specify",8,"Specify cause of failure");
        $this->customValidations("cause_success", "cause_success_specify",6,"Specify cause of success");
        
        
        return parent::beforeValidate();
    }
    public function afterFind(){
        if($this->type_csec){
            $this->type_csec = explode(",", $this->type_csec);
        }
        if($this->cause_csec){
            $this->cause_csec = explode(",", $this->cause_csec);
        }
        if($this->main_care_arrangement){
            $this->main_care_arrangement = explode(",", $this->main_care_arrangement);
        }
        
        return parent::afterFind();
    }
    public function beforeSave($insert){
      
        if($this->isNewRecord){
            $this->date_created = date("Y-m-d H:i:s");
            $this->created_by = Yii::$app->user->identity->id;
        }
        else{
            $this->date_modified = date("Y-m-d H:i:s");
            $this->modified_by = Yii::$app->user->identity->id;
        }
        
        if($this->hasErrors()){
            return false;
        }
        else{
            return true;
        }
    }
    
    public function customValidationsWithArray($field, $errorfield, $value, $message){
        
        if( in_array($value, $this->$field) ){
            if($this->$errorfield == ""){
                $this->addError($errorfield, $message);
            }
        }
        
    }
    public function customValidations($field, $errorfield, $value, $message){
        
        if($this->$field == $value){
            if($this->$errorfield == ""){
                $this->addError($errorfield, $message);
            }
        }
        else{
            if($this->$errorfield != ""){
                $this->addError($errorfield, "Not expecting a value from this field.");
            }
        }
    }
    
    public static function getNames($id = ''){
        if($id){
            //initialize object
            $object = Self::find()->where(['id'=>$id])->one();
            if($object){
                return $object->fname." ".$object->mname." ".$object->lname;
            }
        }
        
        
    }
    
    public function getGridColumns(){
        $fields = $this->attributeLabels();
        $columns = [];
        $lookup_fields = ['child_status','gender','disability','disability_type','county','subcounty','subcounty_office','rescued_csec',
            'counseling','medical_care','legal_support','education_support','vocational_training','empl_voc_training','provided_income','parent_vital_status','family_counseling','family_training','family_income','main_support_provider','comm_contact_person_position','risk_level','case_final_result','cause_failure','cause_success','data_entry_staff_designation'];
        $array_fields = ['type_csec','cause_csec','main_care_arrangement'];

        foreach($fields as $field=>$label){
            
            if(in_array($field, $lookup_fields)){
                $columns[]= [
                       'label'=>$field,
                       'format'=>'raw',
                        'attribute'=>$field,
                       'value'=> function ($data, $model)use($field){
                            return Lookup::getValueFromVar($field, $data->$field);
                        } 
                    ];
            }
            elseif(in_array($field, $array_fields)){
                
                $columns[]= [
                       'label'=>$field,
                       'format'=>'raw',
                        'attribute'=>$field,
                       'value'=> function ($data)use($field){
                            $output = []; $string ='';
                            if(is_array($data->$field)){
                                foreach($data->$field as $key=>$value){
                                    $output[] = Lookup::getValueFromVar($field, $value);
                                }
                            }
                            //implode array of values.
                            $output = implode(",",$output);
                            return $output;
                        } 
                    ];
            }
            elseif($field == "created_by" || $field == "modified_by"){
                $columns[]= [
                        'label'=>$field,
                        'format'=>'raw',
                        'attribute'=>$field,
                        'value'=> function ($data, $model)use($field){
                            return print_r(User::getUserNames($data->$field),true);
                        } 
                 ];
            }
            else{
                $columns[]= [
                           'label'=>$field,
                           'format'=>'raw',
                            'attribute'=>$field,
                           'value'=> function ($data, $model)use($field){
                                return print_r($data->$field,true);
                            } 
                        ];
            }
        }
        return $columns;
    }

    public function customDelete(){
        //delete child records first
        #siblings
        $siblings = Sibling::find()->where(['fk_beneficiary'=>$this->id])->all();
        if($siblings){
            foreach($siblings as $sibling){
                $sibling->delete();
            }
        }

        #Followup
        $followups = Followup::find()->where(['fk_beneficiary'=>$this->id])->all();
        if($followups){
            foreach($followups as $followup){
                $followup->delete();
            }
        }

        #self
        return $this->delete();
    }

  
}
