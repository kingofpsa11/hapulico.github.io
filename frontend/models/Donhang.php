<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_donhang".
 *
 * @property int $id
 * @property int $iddvdh
 * @property string $sodh
 *
 * @property TblDonhangchitiet $id0
 */
class Donhang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_donhang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dvdh_id'], 'integer'],
            [['sodh'], 'string', 'max' => 255],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Donhangchitiet::className(), 'targetAttribute' => ['id' => 'idsodh']],
            [['ngay'],'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dvdh_id' => 'Khách hàng',
            'sodh' => 'Số đơn hàng',
            'ngay' => 'Ngày'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(Donhangchitiet::className(), ['idsodh' => 'id']);
    }
    public function getProvincial()
    {
        return $this->hasOne(Provincial::className(),['id' => 'provincial_id']);
    }

    public function getStatus()
    {
        return $this->hasOne(Status::className(),['id' => 'status_id']);
    }

    public function getCongtycon()
    {
        return $this->hasOne(Donvi::className(),['khachhang_id' => 'dvdh_id']);
    }
}
