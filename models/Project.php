<?php

namespace app\models;
use app\utilities\DataHelper;
use Yii;
use yii\helpers\Url;
use DateTime;


/**
 * This is the model class for table "project".
 *
 * @property int $id
 * @property string|null $project_name
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
 * @property string|null $date_approved
 * @property string|null $review_notes
 * @property string|null $approval_notes
 * @property int|null $data_manager
 * @property int|null $active
 * 
 * @property int|null $resource_required
 * @property int|null $resource_type
 * @property string|null $resource_duration
 * @property int|null $completed
 * @property string|null $date_completed
 * 
 * @property string|null $general_problem
 * @property string|null $proposer_email
 * @property string|null $members_involved
 
* @property string|null $stage
* @property string|null $est_concept_date
* @property string|null $est_sap_date
* @property string|null $est_analysis_date
* @property string|null $est_manuscript_date
* @property string|null $est_pub_date
* stage, est_concept_date, est_sap_date, est_analysis_date, est_manuscript_date, est_pub_date
*/
class Project extends \yii\db\ActiveRecord
{
    public $flag_delete;
    public $file_url;
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
            [['project_name', 'project_aims', 'proposal_type','user_id','date_submitted'], 'required'],
            [['project_aims', 'sap','file_url', 'pub_plan', 'milestones','review_notes','approval_notes', 'resource_duration'], 'string'],
            [['request_type', 'type_data', 'proposal_type', 'irb_other_approval', 'user_id', 'request_status', 'request_approved_by','data_manager','active', 'stage'], 'integer'],
            [['resource_required','resource_type', 'completed'],'integer'],
            [['date_submitted', 'date_review', 'target_completion_date', 'date_approved', 'date_completed', 'general_problem', 'members_involved',
            'stage', 'est_concept_date', 'est_sap_date', 'est_analysis_date', 'est_manuscript_date', 'est_pub_date'], 'safe'],
            [['project_name', 'proposer_email'], 'string', 'max' => 200],
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
            'project_aims' => 'Project Aims',
           // 'request_type' => 'Request Type',
            'type_data' => 'Type of Data',
            'proposal_type' => 'Type of Proposal',
            'date_submitted' => 'Date Submitted',
            'date_review' => 'Date of Review',
            'irb_other_approval' => 'IRB or Other Approvals Sort',
            'sap' => 'Statistical Analysis Plan',
            'pub_plan' => 'Publication Plan',
            'target_completion_date' => 'Target Completion Date',
            'milestones' => 'Milestones',
            'user_id' => 'Primary Contact',
            'request_status' => 'Request Status',
            'request_approved_by' => 'Request Approved By',
            'request_reviewed_by' => 'Request Reviewed By',
            'date_approved' => "Date Approved",
            'review_notes' => "Review Notes",
            'approval_notes' => "Approval Notes",
            "data_manager" => "Data Manager",
            "active" => "Active",
            'resource_required' => 'Resource Required',
            'resource_type' => 'Resource Type',
            'resource_duration' => 'Resource Duration',
            'completed' => "Completed",
            'date_completed' => "Date Completed",
            'stage' => "Stage",
            'est_concept_date' => "Estimated Concept Date", 
            'est_sap_date' => "Estimated SAP Date", 
            'est_analysis_date' => "Estimated End of Analysis", 
            "est_manuscript_date" => "Estimated Manuscript Date", 
            'est_pub_date' => "Estimated Publication Date"
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
    
    public function beforeSave($insert){

        if($this->isNewRecord){
            if($this->request_status == 1){ #new project submitted. Notify data team
              $reviewers = User::getReviewers();
              if($reviewers){
                  foreach($reviewers as $reviewer){
                    $from = User::getFrom($this->user_id);
                    $to = User::getTo($reviewer->id);
                    $subject = "New Analysis Request: ".$this->project_name;
                    $message = "Hi {$reviewer->getNames()}, <br/>We have received an analysis request. Please login to view the details.";
                    Message::sendMessage($from, $to, $subject, $message, $this->id);
                  }

              }
               
            }
        }
        else{
            //this is a resubmission
            if($this->request_status == 4){ #this is a resubmission. Notify data team
                $reviewers = User::getReviewers();
                if($reviewers){
                    foreach($reviewers as $reviewer){
                      $from = User::getFrom($this->user_id);
                      $to = User::getTo($reviewer->id);
                      $project_id = $this->id;
                      $subject = "Updated Analysis Request: ".$this->project_name;
                      $message = "Hi {$reviewer->getNames()}, <br/>We have received updates from this analysis request. Please login to view the details.";
                      Message::sendMessage($from, $to, $subject, $message, $project_id);
                    }
  
                }
                 
            }
        }

        if($this->hasErrors()){
            return false;
        }
        else{
            return true;
        }
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

    public function setReview($current_review){
        $review_user = User::getUserNames($this->request_reviewed_by);
        $notes = $this->review_notes;
        $date = $this->date_review;
        $review = "";
        if($notes){
            $review = <<<HEREDOC
$review_user : <br/>
<p> $notes </p>
<p> Date: $date </p>
HEREDOC;
        }
        
        return $current_review." <p> ". $review ." </p>";

    }

    public function projectStatus(){
        $value = Lookup::getValue("RequestStatus", $this->request_status);

        return $value;
    }

    public static function getName($id){
        $model = self::findone($id);
        if($model){
            return $model->project_name;
        }
    }

    public static function counter($case){
        $list = '';
        switch ($case){
            case "submitted":
                $list = 1;
                break;
            case "under-review":
                $list = "3,4,8";
                break;
            case "pending-approval":
                $list = 2;
                break;
            case "approved":
                $list = "5,6,7";
                break;
            case "all":
                $list = "1,2,3,4,5,6,7,8";
                break;
            default:
                $list=0;

        }
            
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("SELECT count(*) as total FROM project where stage = 1 AND request_status IN ($list)");
        $result = $command->queryAll();
        return $result[0]['total'];
    }

    public static function getStatusQuery($status){
        $query = "";

        switch($status){
            case "submitted":
                $query = "request_status = 1";
                break;
            case "review":
                $query = "request_status IN (3,4,8)";
                break;
            case "pending":
                $query = "request_status = 2";
                break;
            case "approved":
                $query = "request_status IN (5,6,7)";
                break;
            case "all":
                $query = "request_status IN (1,2,3,4,5,6,7,8)";
                break;
            default:
                $query='';
        }

        return $query;
    }

    public static function getStageQuery($stage){
        $query = "";

        switch($stage){
            case "Concept":
                $query = "stage = 1";
                break;
            case "SAP":
                $query = "stage = 2";
                break;
            case "Analysis":
                $query = "stage = 3";
                break;
            case "Manuscript":
                $query = "stage = 4";
                break;
            case "Publication":
                $query = "stage = 5";
                break;
            default:
                $query='';
        }

        return $query;
    }

    public static function getStatusTitle($status){
        $title = "";

        switch($status){
            case "submitted":
                $title = "<span class='btn btn-sm btn-default'>Submitted </span>";
                break;
            case "review":
                $title = "<span class='btn btn-sm btn-info'>Under Review</span>";
                break;
            case "pending":
                $title = "<span class='btn btn-sm btn-warning'>Pending Approval</span>";
                break;
            case "approved":
                $title = "<span class='btn btn-sm btn-success'>Approved</span>";
                break;
            case "all":
                $title = "<span class='btn btn-sm btn-danger'>All</span>";
                break;
            default:
                $title='';
        }

        return $title;
    }

    public function getRequestStatus(){
        #app\models\Lookup::getValue("RequestStatus", $data->request_status)
        $color = self::getStatusColor($this->request_status);
        $value = Lookup::getValue("RequestStatus", $this->request_status);

        return "<span style='color:$color'>".$value."</span>"; 
    }

    public static function getStatusColor($request_status){
        $color = "#85929e";
        switch($request_status){
            case 1:
                $color = "#1c2833";
                break;
            case 2:
                $color = "#9c640c";
                break;
            case 3:
                $color = "#2e86c1";
                break;
            case 4:
                $color = "#2e86c1";
                break;
            case 5:
                $color = "#16a085";
                break;
            case 6:
                $color = "#16a085";
                break;
            case 7:
                $color = "#00FFFF";
                break;
            case 8:
                $color = "#e10e11";
                break;
            default:
                $color = "#e10e11";
                break;
        }

        return $color;
    }

    public function getDataManager(){

        $dh = new DataHelper(); 
        $link = "";
        $value = User::getUserNames($this->data_manager);
        $admin = Yii::$app->user->identity->isAdmin();
        if($admin){
            $url = Url::to(['project/assign','id'=>$this->id],true);
            $value  = $dh->getModalButton($this, "project/assign", "Assign Data Manager", 'btn btn-default', $value,$url);

        }

        return $value;
    }

    public function getStatus(){
        $stage = Lookup::getValue("Stage", $this->stage);
        $due_date = "Not set";
        switch($stage){
            case "Concept":
                $due_date = isset($this->est_concept_date)? $this->est_concept_date: "Not set";
                break;
            case "SAP":
                $due_date = isset($this->est_sap_date)? $this->est_sap_date: "Not set";
                break;
            case "Analysis":
                $due_date = isset($this->est_analysis_date)? $this->est_analysis_date: "Not set";
                break;
            case "Manuscript":
                $due_date = isset($this->est_manuscript_date)? $this->est_manuscript_date: "Not set";
                break;
            case "Publication":
                $due_date = isset($this->est_pub_date)? $this->est_pub_date: "Not set";
                break;
            default:
                $query='';
        }
        $days_due = 0;
        if($due_date != "Not set"){
            $today = new DateTime(date("Y-m-d"));
            $due_date = new DateTime($due_date);
            $days_due = $due_date->diff($today)->format("%a"); 
        }
        $label = "";
        if($days_due < 7){
            $label = '<span class="label label-danger">'.$days_due.' Days</span>';
        }
        elseif($days_due < 14 && $days_due > 7){
            $label = '<span class="label label-warning">'.$days_due.' Days</span>';
        }
        else{
            $label = '<span class="label label-info">'.$days_due.' Days</span>';
        }
        
        return $label;
    }

    public function setRequestStatus(){
        $current_user = Yii::$app->user->identity->id;
        if($current_user == $this->user_id && $this->stage == 1){
            return 4; #resubmitted 
        }
        else{
            return $this->request_status;
        }
    }
}