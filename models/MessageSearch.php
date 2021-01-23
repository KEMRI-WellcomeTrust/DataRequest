<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Message;

/**
 * MessageSearch represents the model behind the search form of `app\models\Message`.
 */
class MessageSearch extends Message
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'msg_status'], 'integer'],
            [['msg_from', 'msg_to', 'msg_subject', 'msg_body'], 'safe'],
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
        $query = Message::find();

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
            'msg_status' => $this->msg_status,
            'project_id' => $this->project_id
        ]);

        $query->andFilterWhere(['like', 'msg_from', $this->msg_from])
            ->andFilterWhere(['like', 'msg_to', $this->msg_to])
            ->andFilterWhere(['like', 'msg_subject', $this->msg_subject])
            ->andFilterWhere(['like', 'msg_body', $this->msg_body]);

        return $dataProvider;
    }
}
