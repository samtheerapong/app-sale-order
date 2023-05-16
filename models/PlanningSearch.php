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

    // **************** เพิ่ม  1 ********************
    public $status_id;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'sale_order_id', 'created_by', 'updated_by'], 'integer'],
            [['planning_start', 'planning_end', 'planning_details', 'created_at', 'updated_at'], 'safe'],
            [['status_id'], 'integer'], // **************** เพิ่ม  2 ********************
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
        // $query = Planning::find();

        // **************** เพิ่ม  3 ********************
        $query = Planning::find()->joinWith('saleOrder.status');
        $query->joinWith(['saleOrder.status']); // Join the 'status' relation

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


        // **************** เพิ่ม  4 ********************
        // Filter by status_id
        $query->andFilterWhere(['status.id' => $this->status_id]);


        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'sale_order_id' => $this->sale_order_id,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at])
            ->andFilterWhere(['like', 'planning_start', $this->planning_start])
            ->andFilterWhere(['like', 'planning_end', $this->planning_end])
            ->andFilterWhere(['like', 'planning_details', $this->planning_details]);

        return $dataProvider;
    }
}
