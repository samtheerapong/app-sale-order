<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Planning;

/**
 * PlanningSearch represents the model behind the search form of `app\models\Planning`.
 */
class PlanningSearch extends Planning
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'sale_order_id'], 'integer'],
            [['planning_details'], 'safe'],
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
        $query = Planning::find();

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
            'sale_order_id' => $this->sale_order_id,
        ]);

        $query->andFilterWhere(['like', 'planning_details', $this->planning_details]);

        return $dataProvider;
    }
}