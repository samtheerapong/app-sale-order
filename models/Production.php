<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "production".
 *
 * @property int $id
 * @property int|null $planning_id
 * @property string|null $production_details
 *
 * @property Planning $planning
 * @property Warehouse[] $warehouses
 */
class Production extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'production';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['planning_id'], 'integer'],
            [['production_details'], 'string'],
            [['planning_id'], 'exist', 'skipOnError' => true, 'targetClass' => Planning::className(), 'targetAttribute' => ['planning_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'planning_id' => Yii::t('app', 'Planning ID'),
            'production_details' => Yii::t('app', 'Production Details'),
        ];
    }

    /**
     * Gets query for [[Planning]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlanning()
    {
        return $this->hasOne(Planning::className(), ['id' => 'planning_id']);
    }

    /**
     * Gets query for [[Warehouses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWarehouses()
    {
        return $this->hasMany(Warehouse::className(), ['production_id' => 'id']);
    }
}
