<?php

namespace frontend\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "thongtinduan".
 *
 * @property int $id
 * @property int $idduan
 * @property string $product
 * @property int $quantity
 * @property int $price
 */
class Thongtinduan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'thongtinduan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product'], 'required','message'=>'{attribute} không được để trống'],
            [['idduan', 'quantity', 'price'], 'integer'],
            [['product'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idduan' => 'Idduan',
            'product' => 'Sản phẩm',
            'quantity' => 'Số lượng',
            'price' => 'Đơn giá',
        ];
    }

    public function search($params)
    {
        $query = Thongtinduan::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'idduan' => $this->idduan,
            'quantity' => $this->quantity,
            'price' => $this->price,
        ]);

        $query->andFilterWhere(['like', 'product', $this->product]);

        return $dataProvider;
    }
}
