<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Followup;

/**
 * FollowupSearch represents the model behind the search form of `app\models\Followup`.
 */
class FollowupSearch extends Followup
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'fk_beneficiary', 'followup_outcome'], 'integer'],
            [['followup_date', 'followup_outcome_desc'], 'safe'],
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
        $query = Followup::find();

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
            'fk_beneficiary' => $this->fk_beneficiary,
            'followup_date' => $this->followup_date,
            'followup_outcome' => $this->followup_outcome,
        ]);

        $query->andFilterWhere(['like', 'followup_outcome_desc', $this->followup_outcome_desc]);

        return $dataProvider;
    }
}
