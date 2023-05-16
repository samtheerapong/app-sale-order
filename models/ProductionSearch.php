<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Production;

/**
 * ProductionSearch represents the model behind the search form of `app\models\Production`.
 */
class ProductionSearch extends Production
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'planning_id'], 'integer'],
            [['production_by', 'production_at', 'production_start', 'production_end', 'production_details'], 'safe'],
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
        $query = Production::find();

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
            'planning_id' => $this->planning_id,
        ]);

        $query->andFilterWhere(['like', 'production_by', $this->production_by])
            ->andFilterWhere(['like', 'production_at', $this->production_at])
            ->andFilterWhere(['like', 'production_start', $this->production_start])
            ->andFilterWhere(['like', 'production_end', $this->production_end])
            ->andFilterWhere(['like', 'production_details', $this->production_details]);

        return $dataProvider;
    }
}
