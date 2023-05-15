<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProductList;

/**
 * ProductListSearch represents the model behind the search form of `app\models\ProductList`.
 */
class ProductListSearch extends ProductList
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sale_order_id', 'product_id', 'quantity', 'counting_unit_id', 'location_id'], 'integer'],
            [['delivery_start', 'delivery_end', 'ref'], 'safe'],
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
        $query = ProductList::find();

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
            'sale_order_id' => $this->sale_order_id,
            'product_id' => $this->product_id,
            'quantity' => $this->quantity,
            'counting_unit_id' => $this->counting_unit_id,
            'location_id' => $this->location_id,
        ]);

        $query->andFilterWhere(['like', 'delivery_start', $this->delivery_start])
            ->andFilterWhere(['like', 'delivery_end', $this->delivery_end])
            ->andFilterWhere(['like', 'ref', $this->ref]);

        return $dataProvider;
    }
}
