<?php

namespace api\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use api\models\CustomerProtect;

/**
 * CustomerProtectSearch represents the model behind the search form of `api\models\CustomerProtect`.
 */
class CustomerProtectSearch extends CustomerProtect
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'customer_id', 'protect_id', 'region_id', 'branch_id', 'user_id', 'user2_id', 'is_over', 'is_confirm'], 'integer'],
            [['level', 'process', 'name', 'address', 'contact', 'mobile', 'image', 'remark', 'brief', 'username', 'over_at', 'over_status', 'over_remark', 'visit_at', 'expire_at', 'create_at'], 'safe'],
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
        $query = CustomerProtect::find();
        $query->joinWith('list');

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
            'customer_id' => $this->customer_id,
            'protect_id' => $this->protect_id,
            'region_id' => $this->region_id,
            'branch_id' => $this->branch_id,
            'user_id' => $this->user_id,
            'user2_id' => $this->user2_id,
            'is_over' => $this->is_over,
            'over_at' => $this->over_at,
            'is_confirm' => $this->is_confirm,
            'visit_at' => $this->visit_at,
            'expire_at' => $this->expire_at,
            'create_at' => $this->create_at,
        ]);

        $query->andFilterWhere(['like', 'level', $this->level])
            ->andFilterWhere(['like', 'process', $this->process])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'contact', $this->contact])
            ->andFilterWhere(['like', 'mobile', $this->mobile])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'remark', $this->remark])
            ->andFilterWhere(['like', 'brief', $this->brief])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'over_status', $this->over_status])
            ->andFilterWhere(['like', 'over_remark', $this->over_remark]);

        return $dataProvider;
    }
}
