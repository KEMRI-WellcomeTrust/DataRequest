<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Project;

/**
 * ProjectSearch represents the model behind the search form of `app\models\Project`.
 */
class ProjectSearch extends Project
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'request_type', 'type_data', 'proposal_type', 'irb_other_approval', 'user_id', 'request_status', 'request_approved_by'], 'integer'],
            [['project_name', 'project_aims', 'date_submitted', 'date_review', 'sap', 'pub_plan', 'target_completion_date', 'milestones', 'request_reviewed_by'], 'safe'],
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
        $query = Project::find();

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
            'request_type' => $this->request_type,
            'type_data' => $this->type_data,
            'proposal_type' => $this->proposal_type,
            'date_submitted' => $this->date_submitted,
            'date_review' => $this->date_review,
            'irb_other_approval' => $this->irb_other_approval,
            'target_completion_date' => $this->target_completion_date,
            'user_id' => $this->user_id,
            'request_status' => $this->request_status,
            'request_approved_by' => $this->request_approved_by,
        ]);

        $query->andFilterWhere(['like', 'project_name', $this->project_name])
            ->andFilterWhere(['like', 'project_aims', $this->project_aims])
            ->andFilterWhere(['like', 'sap', $this->sap])
            ->andFilterWhere(['like', 'pub_plan', $this->pub_plan])
            ->andFilterWhere(['like', 'milestones', $this->milestones])
            ->andFilterWhere(['like', 'request_reviewed_by', $this->request_reviewed_by]);

        return $dataProvider;
    }
}
