<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "progress".
 *
 * @property int $id
 * @property int|null $fk_project
 * @property string|null $title
 * @property string|null $progress_date
 * @property string|null $stage
 * @property string|null $attach_file
 * @property string|null $progress_desc
 * @property string|null $challenges
 * @property int|null $submitted_by
 *
 * @property Project $fkProject
 * @property User $submittedBy
 */
class Progress extends \yii\db\ActiveRecord
{
    public $file_url;
    public $flag_delete;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'progress';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fk_project', 'submitted_by'], 'integer'],
            [['progress_date', 'file_url', 'attach_file','flag_delete'], 'safe'],
            [['attach_file', 'progress_desc', 'challenges'], 'string'],
            [['title'], 'string', 'max' => 200],
            [['stage'], 'string', 'max' => 50],
            [['fk_project'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['fk_project' => 'id']],
            [['submitted_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['submitted_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fk_project' => 'Fk Project',
            'title' => 'Title',
            'progress_date' => 'Progress Date',
            'stage' => 'Stage',
            'attach_file' => 'Attach File',
            'progress_desc' => 'Progress Description',
            'challenges' => 'Challenges',
            'submitted_by' => 'Submitted By',
        ];
    }

    /**
     * Gets query for [[FkProject]].
     *
     * @return \yii\db\ActiveQuery|ProjectQuery
     */
    public function getFkProject()
    {
        return $this->hasOne(Project::className(), ['id' => 'fk_project']);
    }

    /**
     * Gets query for [[SubmittedBy]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getSubmittedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'submitted_by']);
    }

    /**
     * {@inheritdoc}
     * @return ProgressQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProgressQuery(get_called_class());
    }

    public function beforeSave($insert){
        $file_url = trim($this->file_url);

        if($file_url){
            $this->attach_file = $this->file_url;
        }

        if($this->hasErrors()){
            return false;
        }
        else{
            return true;
        }
    }

    public function customDelete(){
        #self
        return $this->delete();
    }

    public function afterSave($insert, $changedAttributes){
        
        if (parent::afterSave($insert, $changedAttributes)) {
            $approvers = User::getApprovers();
            if($approvers){

                foreach($approvers as $approver){
                    $from = User::getFrom($this->user_id);
                    $to = User::getTo($approver->id);
                    $project_id = $this->id;
                    $subject = "Updated Analysis Request: ".$this->fkProject->project_name;
                    $message = "Hi {$approver->getNames()}, <br/>We have received updates from this analysis request. Please login to view the details.";
                    Message::sendMessage($from, $to, $subject, $message, $project_id);
                }

            }
        }
        
    }
}
