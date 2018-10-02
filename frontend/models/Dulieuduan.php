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
            [['iddv', 'provincial', 'quatity', 'price', 'status', 'nguoitao'], 'integer'],
            [['customer', 'product', 'quatity', 'price','provincial'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['customer', 'phone', 'email', 'project', 'product'], 'string', 'max' => 255],
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
            'provincial' => 'Tỉnh thành',
            'project' => 'Dự án/Công trình',
            'product' => 'Tên sản phẩm',
            'quatity' => 'Số lượng',
            'price' => 'Đơn giá',
            'status' => 'Status',
            'nguoitao' => 'Người tạo',
            'created_at' => 'Ngày tạo',
            'updated_at' => 'Ngày sửa',
        ];
    }
}
