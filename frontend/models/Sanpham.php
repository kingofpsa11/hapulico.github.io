<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_sanpham".
 *
 * @property int $id
 * @property string $sanpham
 * @property string $masanpham
 * @property string $donvitinh
 * @property int $trangthai
 * @property int $nguoitao
 * @property string $ngaytao
 * @property int $nguoisua
 * @property string $ngaysua
 * @property int $tontoida
 * @property int $tontoithieu
 */
class Sanpham extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_sanpham';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['trangthai', 'nguoitao', 'nguoisua', 'tontoida', 'tontoithieu'], 'integer'],
            [['ngaytao', 'ngaysua'], 'safe'],
            [['sanpham', 'masanpham', 'donvitinh'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sanpham' => 'Sanpham',
            'masanpham' => 'Masanpham',
            'donvitinh' => 'Donvitinh',
            'trangthai' => 'Trangthai',
            'nguoitao' => 'Nguoitao',
            'ngaytao' => 'Ngaytao',
            'nguoisua' => 'Nguoisua',
            'ngaysua' => 'Ngaysua',
            'tontoida' => 'Tontoida',
            'tontoithieu' => 'Tontoithieu',
        ];
    }
}
