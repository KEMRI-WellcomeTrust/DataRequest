<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Progress;

/**
 * ProgressSearch represents the model behind the search form of `app\models\Progress`.
 */
class ProgressSearch extends Progress
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'fk_project', 'submitted_by'], 'integer'],
            [['title', 'progress_date', 'stage', 'attach_file', 'progress_desc', 'challenges'], 'safe'],
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
        $query = Progress::find();

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
            'fk_project' => $this->fk_project,
            'progress_date' => $this->progress_date,
            'submitted_by' => $this->submitted_by,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'stage', $this->stage])
            ->andFilterWhere(['like', 'attach_file', $this->attach_file])
            ->andFilterWhere(['like', 'progress_desc', $this->progress_desc])
            ->andFilterWhere(['like', 'challenges', $this->challenges]);

        return $dataProvider;
    }
}
