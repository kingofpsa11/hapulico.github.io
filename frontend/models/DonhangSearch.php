<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Donhang;

/**
 * DonhangSearch represents the model behind the search form of `frontend\models\Donhang`.
 */
class DonhangSearch extends Donhang
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['khachhang_id','sodh','solsx','nguoisua','nguoitao'],'string','max'=>255],
            [['ngay','ngaysua'], 'safe'],
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
        $query = Donhang::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $query->leftJoin('tbl_donvi','tbl_donvi.khachhang_id=tbl_donhang.khachhang_id');

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'ngay'=>$this->ngay,
        ]);

        $query
        ->andFilterWhere(['like', 'sodh', $this->sodh])
        ->andFilterWhere(['like', 'solsx', $this->solsx])
        ->andFilterWhere(['like', 'tbl_donvi.tenviettat', $this->khachhang_id]);

        return $dataProvider;
    }
}
