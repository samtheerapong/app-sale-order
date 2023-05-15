<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "counting_unit".
 *
 * @property int $id
 * @property string $unit
 * @property int|null $actived
 *
 * @property ProductList[] $productLists
 */
class CountingUnit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'counting_unit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['unit'], 'required'],
            [['actived'], 'integer'],
            [['unit'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'unit' => Yii::t('app', 'Unit'),
            'actived' => Yii::t('app', 'Actived'),
        ];
    }

    /**
     * Gets query for [[ProductLists]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductLists()
    {
        return $this->hasMany(ProductList::className(), ['counting_unit_id' => 'id']);
    }
}
