<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

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
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'value' => function () {
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
            [['planning_start', 'planning_end'], 'string', 'max' => 45],
            [['planning_start', 'planning_end','planning_details'], 'required'],
            [['sale_order_id'], 'exist', 'skipOnError' => true, 'targetClass' => SaleOrder::className(), 'targetAttribute' => ['sale_order_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'id'),
            'sale_order_id' => Yii::t('app', 'sale_order_id'),
            'created_by' => Yii::t('app', 'created_by'),
            'updated_by' => Yii::t('app', 'updated_by'),
            'created_at' => Yii::t('app', 'created_at'),
            'updated_at' => Yii::t('app', 'updated_at'),
            'planning_start' => Yii::t('app', 'planning_start'),
            'planning_end' => Yii::t('app', 'planning_end'),
            'planning_details' => Yii::t('app', 'planning_details'),
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
