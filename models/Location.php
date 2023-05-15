<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "location".
 *
 * @property int $id
 * @property string $location_name สถานที่
 * @property int|null $actived เปิดใช้งาน
 *
 * @property ProductList[] $productLists
 */
class Location extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'location';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['location_name'], 'required'],
            [['actived'], 'integer'],
            [['location_name'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'location_name' => Yii::t('app', 'สถานที่'),
            'actived' => Yii::t('app', 'เปิดใช้งาน'),
        ];
    }

    /**
     * Gets query for [[ProductLists]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductLists()
    {
        return $this->hasMany(ProductList::className(), ['location_id' => 'id']);
    }
}
