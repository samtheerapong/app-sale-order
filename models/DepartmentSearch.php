<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Department;

/**
 * DepartmentSearch represents the model behind the search form of `app\models\Department`.
 */
class DepartmentSearch extends Department
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'actived'], 'integer'],
            [['department_code', 'department_name', 'department_details', 'department_color', 'department_manager', 'department_head', 'department_email', 'department_tel', 'department_token'], 'safe'],
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
        $query = Department::find();

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
            'actived' => $this->actived,
        ]);

        $query->andFilterWhere(['like', 'department_code', $this->department_code])
            ->andFilterWhere(['like', 'department_name', $this->department_name])
            ->andFilterWhere(['like', 'department_details', $this->department_details])
            ->andFilterWhere(['like', 'department_color', $this->department_color])
            ->andFilterWhere(['like', 'department_manager', $this->department_manager])
            ->andFilterWhere(['like', 'department_head', $this->department_head])
            ->andFilterWhere(['like', 'department_email', $this->department_email])
            ->andFilterWhere(['like', 'department_tel', $this->department_tel])
            ->andFilterWhere(['like', 'department_token', $this->department_token]);

        return $dataProvider;
    }
}
