<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_banggia".
 *
 * @property int $id
 * @property string $masanpham
 * @property string $tensanpham
 * @property string $dvt
 * @property string $ngayapdung
 * @property int $giamua
 * @property int $giabhpl
 * @property int $gianhpl
 * @property int $giavtcn
 * @property int $giacndn
 * @property int $giaxnvh
 * @property int $giakhkd
 * @property int $giactxl
 * @property int $dvsx
 *
 * @property TblDonhangchitiet[] $tblDonhangchitiets
 */
class Banggia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_banggia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ngayapdung'], 'safe'],
            [['giamua', 'giabhpl', 'gianhpl', 'giavtcn', 'giacndn', 'giaxnvh', 'giakhkd', 'giactxl', 'dvsx'], 'integer'],
            [['masanpham', 'tensanpham', 'dvt'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'masanpham' => 'Masanpham',
            'tensanpham' => 'Tensanpham',
            'dvt' => 'Dvt',
            'ngayapdung' => 'Ngayapdung',
            'giamua' => 'Giamua',
            'giabhpl' => 'Giabhpl',
            'gianhpl' => 'Gianhpl',
            'giavtcn' => 'Giavtcn',
            'giacndn' => 'Giacndn',
            'giaxnvh' => 'Giaxnvh',
            'giakhkd' => 'Giakhkd',
            'giactxl' => 'Giactxl',
            'dvsx' => 'Dvsx',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblDonhangchitiets()
    {
        return $this->hasMany(TblDonhangchitiet::className(), ['idsanpham' => 'id']);
    }
}
