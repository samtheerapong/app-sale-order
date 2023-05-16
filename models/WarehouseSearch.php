<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Warehouse;

/**
 * WarehouseSearch represents the model behind the search form of `app\models\Warehouse`.
 */
class WarehouseSearch extends Warehouse
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'qc_id'], 'integer'],
            [['warehouse_by', 'warehouse_at', 'warehouse_start', 'warehouse_end', 'warehouse_details'], 'safe'],
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
        $query = Warehouse::find();

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
            'qc_id' => $this->qc_id,
        ]);

        $query->andFilterWhere(['like', 'warehouse_by', $this->warehouse_by])
            ->andFilterWhere(['like', 'warehouse_at', $this->warehouse_at])
            ->andFilterWhere(['like', 'warehouse_start', $this->warehouse_start])
            ->andFilterWhere(['like', 'warehouse_end', $this->warehouse_end])
            ->andFilterWhere(['like', 'warehouse_details', $this->warehouse_details]);

        return $dataProvider;
    }
}
