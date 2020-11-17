<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DataRequest;

/**
 * DataRequestSearch represents the model behind the search form of `app\models\DataRequest`.
 */
class DataRequestSearch extends DataRequest
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'project_id', 'user_id', 'approved_by', 'status'], 'integer'],
            [['data_crfs', 'data_variables', 'data_sites', 'date_from', 'date_to', 'other_info', 'received_date', 'reviewed_by', 'approved_date', 'status_comments', 'feedback'], 'safe'],
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
        $query = DataRequest::find();

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
            'project_id' => $this->project_id,
            'user_id' => $this->user_id,
            'date_from' => $this->date_from,
            'date_to' => $this->date_to,
            'received_date' => $this->received_date,
            'approved_by' => $this->approved_by,
            'approved_date' => $this->approved_date,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'data_crfs', $this->data_crfs])
            ->andFilterWhere(['like', 'data_variables', $this->data_variables])
            ->andFilterWhere(['like', 'data_sites', $this->data_sites])
            ->andFilterWhere(['like', 'other_info', $this->other_info])
            ->andFilterWhere(['like', 'reviewed_by', $this->reviewed_by])
            ->andFilterWhere(['like', 'status_comments', $this->status_comments])
            ->andFilterWhere(['like', 'feedback', $this->feedback]);

        return $dataProvider;
    }
}
