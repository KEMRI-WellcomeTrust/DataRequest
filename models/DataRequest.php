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
            [['project_id', 'user_id', 'approved_by', 'status'], 'integer'],
            [['data_crfs', 'data_variables', 'other_info', 'status_comments', 'feedback'], 'string'],
            [['date_from', 'date_to', 'received_date', 'approved_date'], 'safe'],
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
            'user_id' => 'User ID',
            'data_crfs' => 'Data Crfs',
            'data_variables' => 'Data Variables',
            'data_sites' => 'Data Sites',
            'date_from' => 'Date From',
            'date_to' => 'Date To',
            'other_info' => 'Other Info',
            'received_date' => 'Received Date',
            'reviewed_by' => 'Reviewed By',
            'approved_by' => 'Approved By',
            'approved_date' => 'Approved Date',
            'status' => 'Status',
            'status_comments' => 'Status Comments',
            'feedback' => 'Feedback',
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
}
