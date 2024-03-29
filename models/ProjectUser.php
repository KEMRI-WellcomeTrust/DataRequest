<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "project_user".
 *
 * @property int $id
 * @property int|null $project_id
 * @property string|null $name
 * @property string|null $email
 * @property string|null $affiliation
 * @property string|null $role
 */
class ProjectUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'role','affiliation'], 'required'],
            [['project_id'], 'integer'],
            [['email'], 'string', 'max' => 500],
            [['name', 'affiliation'], 'string', 'max' => 200],
            [['role'], 'string', 'max' => 50]
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
            'email' => 'E-mail',
            'name' => 'Name',
            'affiliation' => 'Affiliation',
            'role' => 'Role',
        ];
    }

    /**
     * {@inheritdoc}
     * @return ProjectUserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProjectUserQuery(get_called_class());
    }

    public function beforeSave($insert){
      
        if($this->hasErrors()){
            return false;
        }
        else{
            return true;
        }
    }
}
