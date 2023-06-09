<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Goods;

/**
 * GoodsSearch represents the model behind the search form of `app\models\Goods`.
 */
class GoodsSearch extends Goods
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'class', 'type', 'surplusnum', 'total', 'drawnum'], 'integer'],
            [['name', 'money', 'price', 'drawprice', 'surplusprice'], 'safe'],
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
        $query = Goods::find();

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
            'class' => $this->class,
            'type' => $this->type,
            'surplusnum' => $this->surplusnum,
            'total' => $this->total,
            'drawnum' => $this->drawnum,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'money', $this->money])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'drawprice', $this->drawprice])
            ->andFilterWhere(['like', 'surplusprice', $this->surplusprice]);

        return $dataProvider;
    }
}
