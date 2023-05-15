<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "planning".
 *
 * @property int $id
 * @property int|null $sale_order_id เลขที่ใบสั่งขาย
 * @property string|null $planning_details
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
            [['sale_order_id'], 'integer'],
            [['planning_details'], 'string'],
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
            'sale_order_id' => Yii::t('app', 'เลขที่ใบสั่งขาย'),
            'planning_details' => Yii::t('app', 'Planning Details'),
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
