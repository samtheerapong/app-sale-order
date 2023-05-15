<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_list".
 *
 * @property int $sale_order_id
 * @property int $product_id
 * @property string|null $delivery_start วันที่ส่ง
 * @property string|null $delivery_end วันที่ถึง
 * @property int|null $quantity จำนวน
 * @property int|null $counting_unit_id หน่วยนับ
 * @property int|null $location_id สถานที่
 * @property string|null $ref อ้างอิง
 *
 * @property Product $product
 * @property SaleOrder $saleOrder
 * @property CountingUnit $countingUnit
 * @property Location $location
 */
class ProductList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sale_order_id', 'product_id'], 'required'],
            [['sale_order_id', 'product_id', 'quantity', 'counting_unit_id', 'location_id'], 'integer'],
            [['delivery_start', 'delivery_end', 'ref'], 'string', 'max' => 45],
            [['sale_order_id', 'product_id'], 'unique', 'targetAttribute' => ['sale_order_id', 'product_id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['sale_order_id'], 'exist', 'skipOnError' => true, 'targetClass' => SaleOrder::className(), 'targetAttribute' => ['sale_order_id' => 'id']],
            [['counting_unit_id'], 'exist', 'skipOnError' => true, 'targetClass' => CountingUnit::className(), 'targetAttribute' => ['counting_unit_id' => 'id']],
            [['location_id'], 'exist', 'skipOnError' => true, 'targetClass' => Location::className(), 'targetAttribute' => ['location_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'sale_order_id' => Yii::t('app', 'Sale Order ID'),
            'product_id' => Yii::t('app', 'Product ID'),
            'delivery_start' => Yii::t('app', 'วันที่ส่ง'),
            'delivery_end' => Yii::t('app', 'วันที่ถึง'),
            'quantity' => Yii::t('app', 'จำนวน'),
            'counting_unit_id' => Yii::t('app', 'หน่วยนับ'),
            'location_id' => Yii::t('app', 'สถานที่'),
            'ref' => Yii::t('app', 'อ้างอิง'),
        ];
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
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
     * Gets query for [[CountingUnit]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCountingUnit()
    {
        return $this->hasOne(CountingUnit::className(), ['id' => 'counting_unit_id']);
    }

    /**
     * Gets query for [[Location]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLocation()
    {
        return $this->hasOne(Location::className(), ['id' => 'location_id']);
    }
}
