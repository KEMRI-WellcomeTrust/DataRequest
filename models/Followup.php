<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%csec_followup}}".
 *
 * @property int $id
 * @property int $fk_beneficiary
 * @property string $followup_date
 * @property int $followup_outcome
 * @property string $followup_outcome_desc
 *
 * @property CsecBeneficiary $fkBeneficiary
 */
class Followup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%csec_followup}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fk_beneficiary', 'followup_outcome'], 'integer'],
            [['followup_date'], 'safe'],
            [['followup_outcome_desc'], 'string'],
            [['fk_beneficiary'], 'exist', 'skipOnError' => true, 'targetClass' => Beneficiary::className(), 'targetAttribute' => ['fk_beneficiary' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fk_beneficiary' => 'Fk Beneficiary',
            'followup_date' => 'Followup Date',
            'followup_outcome' => 'Followup Outcome',
            'followup_outcome_desc' => 'Followup Outcome Desc',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkBeneficiary()
    {
        return $this->hasOne(CsecBeneficiary::className(), ['id' => 'fk_beneficiary']);
    }
}
