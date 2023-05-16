<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "qc".
 *
 * @property int $id
 * @property int|null $production_id
 * @property int|null $qc_by โดย
 * @property string|null $qc_at วันที่
 * @property string|null $qc_start เริ่ม
 * @property string|null $qc_end สิ้นสุด
 * @property string|null $qc_details รายละเอียด
 *
 * @property Production $production
 * @property Warehouse[] $warehouses
 */
class Qc extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'qc';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['production_id', 'qc_by'], 'integer'],
            [['qc_details'], 'string'],
            [['qc_at', 'qc_start', 'qc_end'], 'string', 'max' => 45],
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
            'qc_by' => Yii::t('app', 'โดย'),
            'qc_at' => Yii::t('app', 'วันที่'),
            'qc_start' => Yii::t('app', 'เริ่ม'),
            'qc_end' => Yii::t('app', 'สิ้นสุด'),
            'qc_details' => Yii::t('app', 'รายละเอียด'),
        ];
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

    /**
     * Gets query for [[Warehouses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWarehouses()
    {
        return $this->hasMany(Warehouse::className(), ['qc_id' => 'id']);
    }
}
