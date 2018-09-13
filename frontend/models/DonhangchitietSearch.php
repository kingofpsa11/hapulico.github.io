<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Donhangchitiet;

/**
 * DonhangchitietSearch represents the model behind the search form of `frontend\models\Donhangchitiet`.
 */
class DonhangchitietSearch extends Donhangchitiet
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'idsodh', 'idsanpham', 'soluong', 'idsolsx', 'giamua', 'giaban', 'soluongxuat', 'trangthai', 'nguoitao', 'nguoisua', 'iduser'], 'integer'],
            [['tiendo', 'tiendothucte', 'ngaytao', 'ngaysua'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Donhangchitiet::find();

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
            'idsodh' => $this->idsodh,
            'idsanpham' => $this->idsanpham,
            'soluong' => $this->soluong,
            'idsolsx' => $this->idsolsx,
            'tiendo' => $this->tiendo,
            'tiendothucte' => $this->tiendothucte,
            'giamua' => $this->giamua,
            'giaban' => $this->giaban,
            'soluongxuat' => $this->soluongxuat,
            'trangthai' => $this->trangthai,
            'nguoitao' => $this->nguoitao,
            'ngaytao' => $this->ngaytao,
            'nguoisua' => $this->nguoisua,
            'ngaysua' => $this->ngaysua,
            'iduser' => $this->iduser,
        ]);

        return $dataProvider;
    }
}
