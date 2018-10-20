<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_khachhang".
 *
 * @property int $id
 * @property string $makhach
 * @property string $tenkhach
 * @property string $tenviettat
 * @property int $loaikhach
 */
class Khachhang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_khachhang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['loaikhach','makhach'], 'integer'],
            [['tenkhach', 'tenviettat'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'makhach' => 'Mã Khách',
            'tenkhach' => 'Tên Khách',
            'tenviettat' => 'Tên viết tắt',
            'loaikhach' => 'Loại khách',
        ];
    }
}
