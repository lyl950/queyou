<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Order;

/**
 * Orderearch represents the model behind the search form of `app\models\Order`.
 */
class Orderearch extends Order
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'is_over', 'userId'], 'integer'],
            [['orderId', 'time', 'is_area', 'saleType'], 'safe'],
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
        $query = Order::find();

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
            'status' => $this->status,
            'time' => $this->time,
            'is_over' => $this->is_over,
            'userId' => $this->userId,
        ]);

        $query->andFilterWhere(['like', 'orderId', $this->orderId])
            ->andFilterWhere(['like', 'is_area', $this->is_area])
            ->andFilterWhere(['like', 'saleType', $this->saleType]);

        return $dataProvider;
    }
}
