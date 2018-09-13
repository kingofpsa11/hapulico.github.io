<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "donvi".
 *
 * @property int $id
 * @property string $donvi
 * @property string $tenviettat
 */
class Donvi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'donvi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['donvi', 'tenviettat'], 'required'],
            [['donvi', 'tenviettat'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'donvi' => 'Đơn vị',
            'tenviettat' => 'Tên viết tắt',
        ];
    }
}
