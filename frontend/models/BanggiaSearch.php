<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Banggia;

/**
 * BanggiaSearch represents the model behind the search form of `frontend\models\Banggia`.
 */
class BanggiaSearch extends Banggia
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'giamua', 'giabhpl', 'gianhpl', 'giavtcn', 'giacndn', 'giaxnvh', 'giakhkd', 'giactxl', 'dvsx'], 'integer'],
            [['masanpham', 'tensanpham', 'dvt', 'ngayapdung'], 'safe'],
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
        $query = Banggia::find();

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
            'ngayapdung' => $this->ngayapdung,
            'giamua' => $this->giamua,
            'giabhpl' => $this->giabhpl,
            'gianhpl' => $this->gianhpl,
            'giavtcn' => $this->giavtcn,
            'giacndn' => $this->giacndn,
            'giaxnvh' => $this->giaxnvh,
            'giakhkd' => $this->giakhkd,
            'giactxl' => $this->giactxl,
            'dvsx' => $this->dvsx,
        ]);

        $query->andFilterWhere(['like', 'masanpham', $this->masanpham])
            ->andFilterWhere(['like', 'tensanpham', $this->tensanpham])
            ->andFilterWhere(['like', 'dvt', $this->dvt]);

        return $dataProvider;
    }
}
