<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "planning".
 *
 * @property int $id
 * @property int|null $sale_order_id ใบสั่งขาย
 * @property int|null $planning_by โดย
 * @property string|null $planning_at วันที่
 * @property string|null $planning_start เริ่ม
 * @property string|null $planning_end เสร็จ
 * @property string|null $planning_details รายละเอียด
 *
 * @property SaleOrder $saleOrder
 * @property Production[] $productions
 */
class Planning extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'planning';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sale_order_id', 'planning_by'], 'integer'],
            [['planning_details'], 'string'],
            [['planning_at', 'planning_start', 'planning_end'], 'string', 'max' => 45],
            [['sale_order_id'], 'exist', 'skipOnError' => true, 'targetClass' => SaleOrder::className(), 'targetAttribute' => ['sale_order_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'sale_order_id' => Yii::t('app', 'ใบสั่งขาย'),
            'planning_by' => Yii::t('app', 'โดย'),
            'planning_at' => Yii::t('app', 'วันที่'),
            'planning_start' => Yii::t('app', 'เริ่ม'),
            'planning_end' => Yii::t('app', 'เสร็จ'),
            'planning_details' => Yii::t('app', 'รายละเอียด'),
        ];
    }

    /**
     * Gets query for [[SaleOrder]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSaleOrder()
    {
        return $this->hasOne(SaleOrder::className(), ['id' => 'sale_order_id']);
    }

    /**
     * Gets query for [[Productions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductions()
    {
        return $this->hasMany(Production::className(), ['planning_id' => 'id']);
    }
}
