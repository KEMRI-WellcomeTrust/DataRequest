<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Sibling;

/**
 * SiblingSearch represents the model behind the search form of `app\models\Sibling`.
 */
class SiblingSearch extends Sibling
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'fk_beneficiary'], 'integer'],
            [['sibling_names', 'sibling_dob', 'sibling_school'], 'safe'],
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
        $query = Sibling::find();

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
            'sibling_dob' => $this->sibling_dob,
        ]);

        $query->andFilterWhere(['like', 'sibling_names', $this->sibling_names])
            ->andFilterWhere(['like', 'sibling_school', $this->sibling_school]);

        return $dataProvider;
    }
}
