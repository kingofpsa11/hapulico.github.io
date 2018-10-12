<?php

namespace frontend\models;

use Yii;


/**
 * This is the model class for table "dulieuduan".
 *
 * @property int $id
 * @property int $iddv
 * @property string $customer
 * @property string $phone
 * @property string $email
 * @property int $provincial
 * @property string $project
 * @property string $product
 * @property int $quatity
 * @property int $price
 * @property int $status
 * @property int $nguoitao
 * @property string $created_at
 * @property string $updated_at
 */
class Dulieuduan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dulieuduan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['iddv', 'status_id', 'nguoitao','provincial_id'], 'integer'],
            [['customer','provincial_id','status_id'], 'required','message'=>'{attribute} không được để trống'],
            [['created_at', 'updated_at'], 'safe'],
            [['customer', 'phone', 'email', 'project'], 'string', 'max' => 255],
            ['email','email'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'iddv' => 'Đơn vị',
            'customer' => 'Khách hàng',
            'phone' => 'Số điện thoại',
            'email' => 'Email',
            'provincial_id' => 'Tỉnh thành',
            'project' => 'Dự án/Công trình',            
            'status_id' => 'Trạng thái',
            'nguoitao' => 'Người tạo',
            'created_at' => 'Ngày tạo',
            'updated_at' => 'Ngày sửa',
        ];
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
        return $this->hasOne(Donvi::className(),['id' => 'iddv']);
    }
}
