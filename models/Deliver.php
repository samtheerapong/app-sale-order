<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "deliver".
 *
 * @property int $id
 * @property int|null $warehouse_id
 * @property string|null $deliver_details
 *
 * @property Warehouse $warehouse
 */
class Deliver extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'deliver';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['warehouse_id'], 'integer'],
            [['deliver_details'], 'string'],
            [['warehouse_id'], 'exist', 'skipOnError' => true, 'targetClass' => Warehouse::className(), 'targetAttribute' => ['warehouse_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'warehouse_id' => Yii::t('app', 'Warehouse ID'),
            'deliver_details' => Yii::t('app', 'Deliver Details'),
        ];
    }

    /**
     * Gets query for [[Warehouse]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWarehouse()
    {
        return $this->hasOne(Warehouse::className(), ['id' => 'warehouse_id']);
    }
}
