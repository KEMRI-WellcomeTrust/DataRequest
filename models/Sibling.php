<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%csec_sibling}}".
 *
 * @property int $id
 * @property int $fk_beneficiary
 * @property string $sibling_names
 * @property string $sibling_dob
 * @property string $sibling_school
 *
 * @property CsecBeneficiary $fkBeneficiary
 */
class Sibling extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%csec_sibling}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fk_beneficiary'], 'integer'],
            [['sibling_dob'], 'safe'],
            [['sibling_names', 'sibling_school'], 'string', 'max' => 500],
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
            'sibling_names' => 'Sibling Names',
            'sibling_dob' => 'Sibling Dob',
            'sibling_school' => 'Sibling School',
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
