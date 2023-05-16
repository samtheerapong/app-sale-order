<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "deliver".
 *
 * @property int $id
 * @property int|null $warehouse_id คลัง
 * @property string|null $deliver_by โดย
 * @property string|null $deliver_at วันที่
 * @property string|null $deliver_start เริ่ม
 * @property string|null $deliver_end เสร็จ
 * @property string|null $deliver_details รายละเอียด
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
            [['deliver_by', 'deliver_at', 'deliver_start', 'deliver_end'], 'string', 'max' => 45],
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
            'warehouse_id' => Yii::t('app', 'คลัง'),
            'deliver_by' => Yii::t('app', 'โดย'),
            'deliver_at' => Yii::t('app', 'วันที่'),
            'deliver_start' => Yii::t('app', 'เริ่ม'),
            'deliver_end' => Yii::t('app', 'เสร็จ'),
            'deliver_details' => Yii::t('app', 'รายละเอียด'),
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
