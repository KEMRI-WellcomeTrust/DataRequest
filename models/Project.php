<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "project".
 *
 * @property int $id
 * @property string|null $project_name
 * @property string|null $project_desc
 * @property string|null $project_aims
 * @property int|null $request_type
 * @property int|null $type_data
 * @property int|null $proposal_type
 * @property string|null $date_submitted
 * @property string|null $date_review
 * @property int|null $irb_other_approval
 * @property string|null $sap
 * @property string|null $pub_plan
 * @property string|null $target_completion_date
 * @property string|null $milestones
 * @property int|null $user_id
 * @property int|null $request_status
 * @property int|null $request_approved_by
 * @property string|null $request_reviewed_by
 */
class Project extends \yii\db\ActiveRecord
{
    public $flag_delete;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['project_name','project_desc', 'project_aims', 'request_type', 'type_data', 'proposal_type'], 'required'],
            [['project_desc', 'project_aims', 'sap', 'pub_plan', 'milestones'], 'string'],
            [['request_type', 'type_data', 'proposal_type', 'irb_other_approval', 'user_id', 'request_status', 'request_approved_by'], 'integer'],
            [['date_submitted', 'date_review', 'target_completion_date'], 'safe'],
            [['project_name'], 'string', 'max' => 200],
            [['request_reviewed_by'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_name' => 'Project Name',
            'project_desc' => 'Project Description',
            'project_aims' => 'Project Aims',
            'request_type' => 'Request Type',
            'type_data' => 'Type of Data',
            'proposal_type' => 'Type of Proposal',
            'date_submitted' => 'Date Submitted',
            'date_review' => 'Date of Review',
            'irb_other_approval' => 'IRB or Other Approvals Sort',
            'sap' => 'Statistical Analysis Plan',
            'pub_plan' => 'Publication Plan',
            'target_completion_date' => 'Target Completion Date',
            'milestones' => 'Milestones',
            'user_id' => 'Responsible User',
            'request_status' => 'Request Status',
            'request_approved_by' => 'Request Approved By',
            'request_reviewed_by' => 'Request Reviewed By',
        ];
    }

    /**
     * {@inheritdoc}
     * @return ProjectQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProjectQuery(get_called_class());
    }

    public function getGridColumns(){
        $fields = $this->attributeLabels();
        $columns = [];
        $lookup_fields = [];
        $array_fields = [];
        /* ['child_status','gender','disability','disability_type','county','subcounty','subcounty_office','rescued_csec',
            'counseling','medical_care','legal_support','education_support','vocational_training','empl_voc_training','provided_income','parent_vital_status','family_counseling','family_training','family_income','main_support_provider','comm_contact_person_position','risk_level','case_final_result','cause_failure','cause_success','data_entry_staff_designation'];
        $array_fields = ['type_csec','cause_csec','main_care_arrangement'];
        */

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
}
