<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "warehouse".
 *
 * @property int $id
 * @property int $qc_id คุณภาพ
 * @property string|null $warehouse_by โดย
 * @property string|null $warehouse_at วันที่
 * @property string|null $warehouse_start เริ่ม
 * @property string|null $warehouse_end เสร็จ
 * @property string|null $warehouse_details รายละเอียด
 *
 * @property Deliver[] $delivers
 * @property Qc $qc
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
            [['qc_id'], 'required'],
            [['qc_id'], 'integer'],
            [['warehouse_details'], 'string'],
            [['warehouse_by', 'warehouse_at', 'warehouse_start', 'warehouse_end'], 'string', 'max' => 45],
            [['qc_id'], 'exist', 'skipOnError' => true, 'targetClass' => Qc::className(), 'targetAttribute' => ['qc_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'qc_id' => Yii::t('app', 'คุณภาพ'),
            'warehouse_by' => Yii::t('app', 'โดย'),
            'warehouse_at' => Yii::t('app', 'วันที่'),
            'warehouse_start' => Yii::t('app', 'เริ่ม'),
            'warehouse_end' => Yii::t('app', 'เสร็จ'),
            'warehouse_details' => Yii::t('app', 'รายละเอียด'),
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
     * Gets query for [[Qc]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQc()
    {
        return $this->hasOne(Qc::className(), ['id' => 'qc_id']);
    }
}
