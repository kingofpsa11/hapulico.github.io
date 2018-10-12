<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Dulieuduan;

/**
 * DulieuduanSearch represents the model behind the search form of `frontend\models\Dulieuduan`.
 */
class DulieuduanSearch extends Dulieuduan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'nguoitao', 'nguoisua'], 'integer'],
            [['provincial_id','status_id', 'iddv'],'string','max'=>255],
            [['customer', 'phone', 'email', 'project', 'created_at', 'updated_at'], 'safe'],
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
        $query = Dulieuduan::find();
        $query->leftJoin('provincial','provincial.id=dulieuduan.provincial_id');
        $query->leftJoin('tbl_status','tbl_status.id=dulieuduan.status_id');

        $donvi = Yii::$app->user->identity->donvi;
        if($donvi == 1 ){
            $query->leftJoin('tbl_donvi','tbl_donvi.id=dulieuduan.iddv');
        }
        
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
            'nguoitao' => $this->nguoitao,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'nguoisua' => $this->nguoisua,
        ]);
        if($donvi !== 1 ){
            $query->andFilterWhere(['iddv' => $donvi]);
        }
        else{
            $query->andFilterWhere(['like', 'tbl_donvi.tenviettat', $this->iddv]);
        }


        $query->andFilterWhere(['like', 'customer', $this->customer])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'project', $this->project])
            ->andFilterWhere(['like', 'provincial.name', $this->provincial_id])
            ->andFilterWhere(['like', 'tbl_status.status', $this->status_id]);

        return $dataProvider;
    }
}
