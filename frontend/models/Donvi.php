<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_donvi".
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
        return 'tbl_donvi';
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
            'donvi' => 'Donvi',
            'tenviettat' => 'Tenviettat',
        ];
    }
}
