<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "goodsreturn".
 *
 * @property int $id
 * @property int|null $fid
 * @property string|null $time
 * @property int|null $status 1退货，2换货
 */
class Goodsreturn extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'goodsreturn';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'fid', 'status'], 'integer'],
            [['time'], 'safe'],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fid' => 'Fid',
            'time' => 'Time',
            'status' => 'Status',
        ];
    }
}
