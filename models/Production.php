<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "production".
 *
 * @property int $id
 * @property int|null $planning_id แผนผลิต
 * @property string|null $production_by โดย
 * @property string|null $production_at วันที่
 * @property string|null $production_start เริ่ม
 * @property string|null $production_end เสร็จ
 * @property string|null $production_details รายละเอียด
 *
 * @property Planning $planning
 * @property Qc[] $qcs
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
            [['production_by', 'production_at', 'production_start', 'production_end'], 'string', 'max' => 45],
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
            'planning_id' => Yii::t('app', 'แผนผลิต'),
            'production_by' => Yii::t('app', 'โดย'),
            'production_at' => Yii::t('app', 'วันที่'),
            'production_start' => Yii::t('app', 'เริ่ม'),
            'production_end' => Yii::t('app', 'เสร็จ'),
            'production_details' => Yii::t('app', 'รายละเอียด'),
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
     * Gets query for [[Qcs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQcs()
    {
        return $this->hasMany(Qc::className(), ['production_id' => 'id']);
    }
}
