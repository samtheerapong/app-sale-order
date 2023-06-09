<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Deliver;

/**
 * DeliverSearch represents the model behind the search form of `app\models\Deliver`.
 */
class DeliverSearch extends Deliver
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'warehouse_id'], 'integer'],
            [['deliver_by', 'deliver_at', 'deliver_start', 'deliver_end', 'deliver_details'], 'safe'],
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
        $query = Deliver::find();

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
            'warehouse_id' => $this->warehouse_id,
        ]);

        $query->andFilterWhere(['like', 'deliver_by', $this->deliver_by])
            ->andFilterWhere(['like', 'deliver_at', $this->deliver_at])
            ->andFilterWhere(['like', 'deliver_start', $this->deliver_start])
            ->andFilterWhere(['like', 'deliver_end', $this->deliver_end])
            ->andFilterWhere(['like', 'deliver_details', $this->deliver_details]);

        return $dataProvider;
    }
}
