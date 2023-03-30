<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Fenpei;

/**
 * FenpeiSearch represents the model behind  the search form of `app\models\Fenpei`.
 *  * @property string|null $name  用户名
 */

class FenpeiSearch extends Fenpei
{
    /**
     * {@inheritdoc}
     */

    public  $name;
    public function rules()
    {
        return [
            [['id', 'goodsId', 'is_over', 'is_area', 'saleType' ,'orderId'], 'integer'],
            [['userId','name', 'nums', 'money', 'time', 'class', 'status',], 'safe'],

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
        $query = Fenpei::find();
        $query->joinWith(['userName']);
        $query->joinWith(['goodsInfo']);
        $query->joinWith(['order']);
        $query->select("fenpei.*,users.name,goods.name as goodsname,order.is_over");
        $query->where("order.is_over = 1");

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
            'goodsId' => $this->goodsId,
            'time' => $this->time,
            'is_over' => $this->is_over,
            'is_area' => $this->is_area,
            'saleType' => $this->saleType,
            'fenpei.orderId' => $this->orderId,
        ]);

        $query->andFilterWhere(['like', 'fenpei.userId', $this->userId])
            ->andFilterWhere(['like', 'nums', $this->nums])
            ->andFilterWhere(['like', 'fenpei.money', $this->money])
            ->andFilterWhere(['like', 'class', $this->class])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'users.name', $this->name]);

        return $dataProvider;
    }
}
