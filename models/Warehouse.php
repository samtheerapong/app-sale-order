<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "warehouse".
 *
 * @property int $id
 * @property int|null $production_id
 * @property string|null $warehouse_details
 *
 * @property Deliver[] $delivers
 * @property Production $production
 */
class Warehouse extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'warehouse';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['production_id'], 'integer'],
            [['warehouse_details'], 'string'],
            [['production_id'], 'exist', 'skipOnError' => true, 'targetClass' => Production::className(), 'targetAttribute' => ['production_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'production_id' => Yii::t('app', 'Production ID'),
            'warehouse_details' => Yii::t('app', 'Warehouse Details'),
        ];
    }

    /**
     * Gets query for [[Delivers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDelivers()
    {
        return $this->hasMany(Deliver::className(), ['warehouse_id' => 'id']);
    }

    /**
     * Gets query for [[Production]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduction()
    {
        return $this->hasOne(Production::className(), ['id' => 'production_id']);
    }
}
