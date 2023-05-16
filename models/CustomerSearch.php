<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Customer;

/**
 * CustomerSearch represents the model behind the search form of `app\models\Customer`.
 */
class CustomerSearch extends Customer
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'customer_type_id', 'actived'], 'integer'],
            [['customer_code', 'customer_name', 'customer_en_name', 'customer_addr', 'customer_tel', 'customer_fax', 'customer_email'], 'safe'],
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
        $query = Customer::find();

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
            'customer_type_id' => $this->customer_type_id,
            'actived' => $this->actived,
        ]);

        $query->andFilterWhere(['like', 'customer_code', $this->customer_code])
            ->andFilterWhere(['like', 'customer_name', $this->customer_name])
            ->andFilterWhere(['like', 'customer_en_name', $this->customer_en_name])
            ->andFilterWhere(['like', 'customer_addr', $this->customer_addr])
            ->andFilterWhere(['like', 'customer_tel', $this->customer_tel])
            ->andFilterWhere(['like', 'customer_fax', $this->customer_fax])
            ->andFilterWhere(['like', 'customer_email', $this->customer_email]);

        return $dataProvider;
    }
}
