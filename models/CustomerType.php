<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer_type".
 *
 * @property int $id
 * @property string $customer_code รหัสลูกค้า
 * @property string $customer_type ประเภทลูกค้า
 * @property string|null $actived เปิดใช้งาน
 *
 * @property Customer[] $customers
 */
class CustomerType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_code', 'customer_type'], 'required'],
            [['customer_code', 'actived'], 'string', 'max' => 45],
            [['customer_type'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'customer_code' => Yii::t('app', 'รหัสลูกค้า'),
            'customer_type' => Yii::t('app', 'ประเภทลูกค้า'),
            'actived' => Yii::t('app', 'เปิดใช้งาน'),
        ];
    }

    /**
     * Gets query for [[Customers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustomers()
    {
        return $this->hasMany(Customer::className(), ['customer_type_id' => 'id']);
    }
}
