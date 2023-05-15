<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "status".
 *
 * @property int $id
 * @property string $status_code รหัสสถานะ
 * @property string $status_name ชื่อสถานะ
 * @property string|null $status_details รายละเอียดสถานะ
 * @property string|null $status_color สีของสถานะ
 * @property int|null $actived เปิดใช้งาน
 *
 * @property SaleOrder[] $saleOrders
 */
class Status extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status_code', 'status_name'], 'required'],
            [['status_details'], 'string'],
            [['actived'], 'integer'],
            [['status_code', 'status_color'], 'string', 'max' => 20],
            [['status_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'status_code' => Yii::t('app', 'รหัสสถานะ'),
            'status_name' => Yii::t('app', 'ชื่อสถานะ'),
            'status_details' => Yii::t('app', 'รายละเอียดสถานะ'),
            'status_color' => Yii::t('app', 'สีของสถานะ'),
            'actived' => Yii::t('app', 'เปิดใช้งาน'),
        ];
    }

    /**
     * Gets query for [[SaleOrders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSaleOrders()
    {
        return $this->hasMany(SaleOrder::className(), ['status_id' => 'id']);
    }
}
