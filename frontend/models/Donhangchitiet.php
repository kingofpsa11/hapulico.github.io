<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_donhangchitiet".
 *
 * @property int $id
 * @property int $idsodh
 * @property int $idsanpham
 * @property int $soluong
 * @property int $idsolsx
 * @property string $tiendo
 * @property string $tiendothucte
 * @property int $giamua
 * @property int $giaban
 * @property int $soluongxuat
 * @property int $trangthai
 * @property int $nguoitao
 * @property string $ngaytao
 * @property int $nguoisua
 * @property string $ngaysua
 * @property int $iduser
 *
 * @property TblDonhang $tblDonhang
 */
class Donhangchitiet extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_donhangchitiet';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idsodh', 'idsanpham', 'soluong', 'idsolsx', 'giamua', 'giaban', 'soluongxuat', 'trangthai', 'nguoitao', 'nguoisua', 'iduser'], 'integer'],
            [['tiendo', 'tiendothucte', 'ngaytao', 'ngaysua'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idsodh' => 'Idsodh',
            'idsanpham' => 'Tên sản phẩm',
            'soluong' => 'Số lượng',
            'idsolsx' => 'Idsolsx',
            'tiendo' => 'Tiến độ',
            'tiendothucte' => 'Tiến độ thực tế',
            'giamua' => 'Giamua',
            'giaban' => 'Giá bán',
            'soluongxuat' => 'Soluongxuat',
            'trangthai' => 'Trangthai',
            'nguoitao' => 'Nguoitao',
            'ngaytao' => 'Ngaytao',
            'nguoisua' => 'Nguoisua',
            'ngaysua' => 'Ngaysua',
            'iduser' => 'Iduser',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDonhang()
    {
        return $this->hasOne(Donhang::className(), ['id' => 'idsodh']);
    }
}
