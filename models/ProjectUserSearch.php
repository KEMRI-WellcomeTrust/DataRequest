<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProjectUser;

/**
 * ProjectUserSearch represents the model behind the search form of `app\models\ProjectUser`.
 */
class ProjectUserSearch extends ProjectUser
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'project_id'], 'integer'],
            [['name', 'affiliation', 'role'], 'safe'],
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
        $query = ProjectUser::find();

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
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
             ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'affiliation', $this->affiliation])
            ->andFilterWhere(['like', 'role', $this->role]);

        return $dataProvider;
    }
}
