<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Qc;

/**
 * QcSearch represents the model behind the search form of `app\models\Qc`.
 */
class QcSearch extends Qc
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'production_id', 'qc_by'], 'integer'],
            [['qc_at', 'qc_start', 'qc_end', 'qc_details'], 'safe'],
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
        $query = Qc::find();

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
            'production_id' => $this->production_id,
            'qc_by' => $this->qc_by,
        ]);

        $query->andFilterWhere(['like', 'qc_at', $this->qc_at])
            ->andFilterWhere(['like', 'qc_start', $this->qc_start])
            ->andFilterWhere(['like', 'qc_end', $this->qc_end])
            ->andFilterWhere(['like', 'qc_details', $this->qc_details]);

        return $dataProvider;
    }
}
