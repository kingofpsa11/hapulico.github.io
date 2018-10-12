<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "provincial".
 *
 * @property int $id_provincial
 * @property string $name
 * @property string $type
 */
class Provincial extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'provincial';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'type'], 'required'],
            [['name'], 'string', 'max' => 200],
            [['type'], 'string', 'max' => 225],
            [['khuvuc'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Id',
            'name' => 'Name',
            'type' => 'Type',
            'khuvuc' => 'Khu vực'
        ];
    }

}
