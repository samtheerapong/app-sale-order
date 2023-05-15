<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "department".
 *
 * @property int $id
 * @property string $department_code รหัสแผนก
 * @property string $department_name ชื่อแผนก
 * @property string|null $department_details รายละเอียดแผนก
 * @property string|null $department_color สีของแผนก
 * @property string|null $department_manager ผู้จัดการแผนก
 * @property string|null $department_head หัวหน้าแผนก
 * @property string|null $department_email อีเมลของแผนก
 * @property string|null $department_tel เบอร์โทรของแผนก
 * @property string|null $department_token รหัสโทเค่น
 * @property int|null $actived เปิดใช้งาน
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'department';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['department_code', 'department_name'], 'required'],
            [['department_details'], 'string'],
            [['actived'], 'integer'],
            [['department_code', 'department_color'], 'string', 'max' => 20],
            [['department_name'], 'string', 'max' => 100],
            [['department_manager', 'department_head', 'department_email', 'department_tel', 'department_token'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'department_code' => Yii::t('app', 'รหัสแผนก'),
            'department_name' => Yii::t('app', 'ชื่อแผนก'),
            'department_details' => Yii::t('app', 'รายละเอียดแผนก'),
            'department_color' => Yii::t('app', 'สีของแผนก'),
            'department_manager' => Yii::t('app', 'ผู้จัดการแผนก'),
            'department_head' => Yii::t('app', 'หัวหน้าแผนก'),
            'department_email' => Yii::t('app', 'อีเมลของแผนก'),
            'department_tel' => Yii::t('app', 'เบอร์โทรของแผนก'),
            'department_token' => Yii::t('app', 'รหัสโทเค่น'),
            'actived' => Yii::t('app', 'เปิดใช้งาน'),
        ];
    }
}
