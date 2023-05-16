<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property int $id
 * @property string $customer_code รหัสลูกค้า
 * @property string $customer_name ชื่อลูกค้า
 * @property string|null $customer_en_name ชื่อภาษาอังกฤษ
 * @property int|null $customer_type_id ประเภทลูกค้า
 * @property string|null $customer_addr ที่อยู่ลูกค้า
 * @property string|null $customer_tel เบอร์ติดต่อ
 * @property string|null $customer_fax เบอร์ fax
 * @property string|null $customer_email อีเมลลูกค้า
 * @property int|null $actived เปิดใช้งาน
 *
 * @property CustomerType $customerType
 * @property SaleOrder[] $saleOrders
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_code', 'customer_name'], 'required'],
            [['customer_type_id', 'actived'], 'integer'],
            [['customer_addr'], 'string'],
            [['customer_code', 'customer_tel', 'customer_fax', 'customer_email'], 'string', 'max' => 45],
            [['customer_name', 'customer_en_name'], 'string', 'max' => 200],
            [['customer_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => CustomerType::className(), 'targetAttribute' => ['customer_type_id' => 'id']],
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
            'customer_name' => Yii::t('app', 'ชื่อลูกค้า'),
            'customer_en_name' => Yii::t('app', 'ชื่อภาษาอังกฤษ'),
            'customer_type_id' => Yii::t('app', 'ประเภทลูกค้า'),
            'customer_addr' => Yii::t('app', 'ที่อยู่ลูกค้า'),
            'customer_tel' => Yii::t('app', 'เบอร์ติดต่อ'),
            'customer_fax' => Yii::t('app', 'เบอร์ fax'),
            'customer_email' => Yii::t('app', 'อีเมลลูกค้า'),
            'actived' => Yii::t('app', 'เปิดใช้งาน'),
        ];
    }

    /**
     * Gets query for [[CustomerType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerType()
    {
        return $this->hasOne(CustomerType::className(), ['id' => 'customer_type_id']);
    }

    /**
     * Gets query for [[SaleOrders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSaleOrders()
    {
        return $this->hasMany(SaleOrder::className(), ['customer_id' => 'id']);
    }
}
