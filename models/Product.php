<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $product_code
 * @property string $product_name
 * @property string|null $product_details
 *
 * @property ProductList[] $productLists
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_code', 'product_name'], 'required'],
            [['product_details'], 'string'],
            [['product_code', 'product_name'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'product_code' => Yii::t('app', 'Product Code'),
            'product_name' => Yii::t('app', 'Product Name'),
            'product_details' => Yii::t('app', 'Product Details'),
        ];
    }

    /**
     * Gets query for [[ProductLists]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductLists()
    {
        return $this->hasMany(ProductList::className(), ['product_id' => 'id']);
    }
}
