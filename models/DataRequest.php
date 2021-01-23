<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_request".
 *
 * @property int $id
 * @property int|null $project_id
 * @property int|null $user_id
 * @property string|null $data_crfs
 * @property string|null $data_variables
 * @property string|null $data_sites
 * @property string|null $date_from
 * @property string|null $date_to
 * @property string|null $other_info
 * @property string|null $received_date
 * @property string|null $reviewed_by
 * @property int|null $approved_by
 * @property string|null $approved_date
 * @property int|null $status
 * @property string|null $status_comments
 * @property string|null $feedback
 * @property string|null $review_date
 * @property string|null $review_comments 
 *  @property int|null $data_manager 
* @property int|null $issued_status
* @property string|null $issued_date
 * 
 */
class DataRequest extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_request';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'data_crfs', 'data_variables', 'data_sites', 'other_info'], 'required'],
            [['project_id', 'user_id', 'approved_by', 'status','data_manager','issued_status'], 'integer'],
            [['data_crfs', 'data_variables', 'other_info', 'status_comments', 'feedback','review_comments','issued_date'], 'string'],
            [['date_from', 'date_to', 'received_date', 'approved_date', 'review_date'], 'safe'],
            [['data_sites', 'reviewed_by'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_id' => 'Project ID',
            'user_id' => 'Primary Contact',
            'data_crfs' => 'Data CRFs',
            'data_variables' => 'Data Variables',
            'data_sites' => 'Data Sites',
            'date_from' => 'Date From',
            'date_to' => 'Date To',
            'other_info' => 'Justification for variables',
            'received_date' => 'Received Date',
            'reviewed_by' => 'Reviewed By',
            'approved_by' => 'Approved By',
            'approved_date' => 'Approved Date',
            'status' => 'Status',
            'status_comments' => 'Status Comments',
            'feedback' => 'Feedback',
            'review_date' => "Date Reviewed",
            'review_comments' => "Review Comments",
            'data_manager' => "Data Manager",
            'issued_status' => "Issued Status",
            'issued_date' => "Issued Date"
        ];
    }

    /**
     * {@inheritdoc}
     * @return DataRequestQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DataRequestQuery(get_called_class());
    }

    public function setReview($current_review){
        $review_user = User::getUserNames($this->reviewed_by);
        $notes = $this->review_comments;
        $date = $this->review_date;
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
}
