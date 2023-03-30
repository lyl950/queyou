<?php

namespace api\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use api\models\Customer;

/**
 * CustomerSearch represents the model behind the search form of `api\models\Customer`.
 */
class CustomerSearch extends Customer
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'class', 'is_expire', 'is_share', 'branch_id', 'user_id', 'contact_user_id', 'contact_user2_id', 'sale_user_id', 'status', 'is_deleted', 'protect_id', 'related_customer', 'is_require_sign', 'biz_area', 'biz_have_chain', 'biz_holder_num', 'biz_zoom_num', 'mjj_num', 'reassign'], 'integer'],
            [['title', 'tracking_state', 'expire_time', 'save_at', 'last_at', 'company', 'country', 'name', 'mobile', 'province', 'city', 'area', 'address', 'detailed_address', 'longitude', 'latitude', 'type', 'labels', 'biz_level', 'biz_create_date', 'avatar', 'image', 'desc', 'last_work_finish_at', 'last_baoyang_finish_at', 'vw_type', 'create_at'], 'safe'],
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
        $query = Customer::find();

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
            'is_expire' => $this->is_expire,
            'is_share' => $this->is_share,
            'branch_id' => $this->branch_id,
            'user_id' => $this->user_id,
            'contact_user_id' => $this->contact_user_id,
            'contact_user2_id' => $this->contact_user2_id,
            'sale_user_id' => $this->sale_user_id,
            'status' => $this->status,
            'is_deleted' => $this->is_deleted,
            'protect_id' => $this->protect_id,
            'expire_time' => $this->expire_time,
            'save_at' => $this->save_at,
            'last_at' => $this->last_at,
            'related_customer' => $this->related_customer,
            'is_require_sign' => $this->is_require_sign,
            'biz_area' => $this->biz_area,
            'biz_have_chain' => $this->biz_have_chain,
            'biz_holder_num' => $this->biz_holder_num,
            'biz_zoom_num' => $this->biz_zoom_num,
            'biz_create_date' => $this->biz_create_date,
            'mjj_num' => $this->mjj_num,
            'last_work_finish_at' => $this->last_work_finish_at,
            'last_baoyang_finish_at' => $this->last_baoyang_finish_at,
            'reassign' => $this->reassign,
            'create_at' => $this->create_at,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'tracking_state', $this->tracking_state])
            ->andFilterWhere(['like', 'company', $this->company])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'mobile', $this->mobile])
            ->andFilterWhere(['like', 'province', $this->province])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'area', $this->area])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'detailed_address', $this->detailed_address])
            ->andFilterWhere(['like', 'longitude', $this->longitude])
            ->andFilterWhere(['like', 'latitude', $this->latitude])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'labels', $this->labels])
            ->andFilterWhere(['like', 'biz_level', $this->biz_level])
            ->andFilterWhere(['like', 'avatar', $this->avatar])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'desc', $this->desc])
            ->andFilterWhere(['like', 'vw_type', $this->vw_type]);

        return $dataProvider;
    }
}
