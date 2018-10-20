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
            [['sodh','khachhang_id','ngay','user_id_created','user_id_updated','created_at','updated_at'],'required'],
            [['khachhang_id'], 'integer'],
            [['sodh'], 'string', 'max' => 255],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Donhangchitiet::className(), 'targetAttribute' => ['id' => 'sodh_id']],
            [['ngay','created_at','updated_at'],'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'solsx' => 'Số lệnh sản xuất',
            'user_id_created' => 'Người tạo',
            'created_at' => 'Ngày tạo',
            'user_id_updated' => 'Người sửa',
            'updated_at' => 'Ngày sửa',
            'khachhang_id' => 'Khách hàng',
            'sodh' => 'Số đơn hàng',
            'ngay' => 'Ngày'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(Donhangchitiet::className(), ['sodh_id' => 'id']);
    }
    public function getCongtycon()
    {
        return $this->hasOne(Donvi::className(),['khachhang_id' => 'khachhang_id']);
    }
}
