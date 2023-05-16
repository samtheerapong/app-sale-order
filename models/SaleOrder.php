<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
use yii\db\BaseActiveRecord;
use yii\db\Expression;

//
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\Json;

//
use app\models\User;
use app\models\Profile;

/**
 * This is the model class for table "sale_order".
 *
 * @property int $id
 * @property int $status_id
 * @property string|null $created_at วันที่
 * @property string|null $updated_at ปรับปรุง
 * @property string|null $created_by สร้างโดย
 * @property string|null $updated_by ปรับปรุงโดย
 * @property string|null $order_number เลขที่ใบสั่งซื้อ
 * @property int|null $customer_id ลูกค้า
 * @property string|null $title หัวเรื่อง
 * @property string|null $details รายละเอียด
 * @property string|null $ref อ้างอิง
 * @property string|null $remask หมายเหตุ
 *
 * @property Planning[] $plannings
 * @property ProductList[] $productLists
 * @property Customer $customer
 * @property Status $status
 * @property receipt_date $receipt_date
 */
class SaleOrder extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'value' => function() {
                    return date('Y-m-d H:i:s');
                },
            ],
            [
                'class' => BlameableBehavior::class,
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sale_order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status_id'], 'required'],
            [['status_id', 'customer_id'], 'integer'],
            [['details', 'remask'], 'string'],
            [['created_at', 'updated_at', 'created_by', 'updated_by', 'order_number', 'ref', 'receipt_date'], 'string', 'max' => 45],
            [['title'], 'string', 'max' => 255],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['customer_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['status_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'status_id' => Yii::t('app', 'สถานะ'),
            'created_at' => Yii::t('app', 'วันที่'),
            'updated_at' => Yii::t('app', 'ปรับปรุง'),
            'created_by' => Yii::t('app', 'สร้างโดย'),
            'updated_by' => Yii::t('app', 'ปรับปรุงโดย'),
            'order_number' => Yii::t('app', 'เลขที่ใบสั่งขาย'),
            'customer_id' => Yii::t('app', 'ลูกค้า'),
            'title' => Yii::t('app', 'หัวเรื่อง'),
            'details' => Yii::t('app', 'รายละเอียด'),
            'ref' => Yii::t('app', 'อ้างอิง'),
            'remask' => Yii::t('app', 'หมายเหตุ'),
            'receipt_date' => Yii::t('app', 'วันที่ต้องการสินค้า'),
        ];
    }

    /**
     * Gets query for [[Plannings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlannings()
    {
        return $this->hasMany(Planning::className(), ['sale_order_id' => 'id']);
    }

    /**
     * Gets query for [[ProductLists]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductLists()
    {
        return $this->hasMany(ProductList::className(), ['sale_order_id' => 'id']);
    }

    /**
     * Gets query for [[Customer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'customer_id']);
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['id' => 'status_id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }
}
