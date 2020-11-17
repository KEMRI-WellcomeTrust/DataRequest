<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Beneficiary;

/**
 * BeneficiarySearch represents the model behind the search form of `app\models\Beneficiary`.
 */
class BeneficiarySearch extends Beneficiary
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'disability_type', 'county', 'subcounty', 'location', 'village', 'type_csec', 'cause_csec', 'counseling', 'medical_care', 'legal_support', 'education_support', 'vocational_training', 'empl_voc_training', 'provided_income', 'family_counseling', 'family_training', 'family_income', 'family_income_date', 'main_care_arrangement', 'main_care_specify', 'main_care_agency', 'main_support_provider', 'comm_contact_person_position', 'risk_level', 'followup_visit', 'case_final_result', 'cause_failure', 'cause_success', 'data_entry_staff_designation', 'created_by', 'modified_by'], 'integer'],
            [['fname', 'mname', 'lname', 'date_intake', 'unique_id', 'child_status', 'gender', 'disability', 'subcounty_office', 'refer_agency', 'type_csec_specify', 'cause_csec_specify', 'activity_desc', 'rescued_csec', 'tracing_date', 'counseling_date', 'medical_care_date', 'legal_support_date', 'educational_support_date', 'vocational_training_date', 'empl_voc_training_date', 'provided_income_date', 'parent_guard_names', 'parent_guard_contacts', 'familty_counseling_date', 'family_training_date', 'main_support_provider_specify', 'comm_contact_person', 'comm_contact_person_pos_specify', 'comm_contact_person_tel', 'cause_failure_specify', 'cause_success_specify', 'data_entry_staff', 'date_created', 'date_modified'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Beneficiary::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
           // 'date_intake' => $this->date_intake,
            'disability_type' => $this->disability_type,
            'county' => $this->county,
            'subcounty' => $this->subcounty,
            'location' => $this->location,
            'village' => $this->village,
            'type_csec' => $this->type_csec,
            'cause_csec' => $this->cause_csec,
            'tracing_date' => $this->tracing_date,
            'counseling' => $this->counseling,
            'counseling_date' => $this->counseling_date,
            'medical_care' => $this->medical_care,
            'medical_care_date' => $this->medical_care_date,
            'legal_support' => $this->legal_support,
            'legal_support_date' => $this->legal_support_date,
            'education_support' => $this->education_support,
            'educational_support_date' => $this->educational_support_date,
            'vocational_training' => $this->vocational_training,
            'vocational_training_date' => $this->vocational_training_date,
            'empl_voc_training' => $this->empl_voc_training,
            'empl_voc_training_date' => $this->empl_voc_training_date,
            'provided_income' => $this->provided_income,
            'provided_income_date' => $this->provided_income_date,
            'family_counseling' => $this->family_counseling,
            'familty_counseling_date' => $this->familty_counseling_date,
            'family_training' => $this->family_training,
            'family_training_date' => $this->family_training_date,
            'family_income' => $this->family_income,
            'family_income_date' => $this->family_income_date,
            'main_care_arrangement' => $this->main_care_arrangement,
            'main_care_specify' => $this->main_care_specify,
            'main_care_agency' => $this->main_care_agency,
            'main_support_provider' => $this->main_support_provider,
            'comm_contact_person_position' => $this->comm_contact_person_position,
            'risk_level' => $this->risk_level,
            'followup_visit' => $this->followup_visit,
            'case_final_result' => $this->case_final_result,
            'cause_failure' => $this->cause_failure,
            'cause_success' => $this->cause_success,
            'data_entry_staff_designation' => $this->data_entry_staff_designation,
            'date_created' => $this->date_created,
            'date_modified' => $this->date_modified,
            'created_by' => $this->created_by,
            'modified_by' => $this->modified_by,
        ]);

        $query->andFilterWhere(['like', 'fname', $this->fname])
            ->andFilterWhere(['like', 'mname', $this->mname])
            ->andFilterWhere(['like', 'lname', $this->lname])
            ->andFilterWhere(['like', 'unique_id', $this->unique_id])
            ->andFilterWhere(['like', 'child_status', $this->child_status])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'disability', $this->disability])
            ->andFilterWhere(['like', 'subcounty_office', $this->subcounty_office])
            ->andFilterWhere(['like', 'refer_agency', $this->refer_agency])
            ->andFilterWhere(['like', 'type_csec_specify', $this->type_csec_specify])
            ->andFilterWhere(['like', 'cause_csec_specify', $this->cause_csec_specify])
            ->andFilterWhere(['like', 'activity_desc', $this->activity_desc])
            ->andFilterWhere(['like', 'rescued_csec', $this->rescued_csec])
            ->andFilterWhere(['like', 'parent_guard_names', $this->parent_guard_names])
            ->andFilterWhere(['like', 'parent_guard_contacts', $this->parent_guard_contacts])
            ->andFilterWhere(['like', 'main_support_provider_specify', $this->main_support_provider_specify])
            ->andFilterWhere(['like', 'comm_contact_person', $this->comm_contact_person])
            ->andFilterWhere(['like', 'comm_contact_person_pos_specify', $this->comm_contact_person_pos_specify])
            ->andFilterWhere(['like', 'comm_contact_person_tel', $this->comm_contact_person_tel])
            ->andFilterWhere(['like', 'cause_failure_specify', $this->cause_failure_specify])
            ->andFilterWhere(['like', 'cause_success_specify', $this->cause_success_specify])
            ->andFilterWhere(['like', 'data_entry_staff', $this->data_entry_staff]);

        return $dataProvider;
    }
}
