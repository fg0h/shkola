<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Raspisanie;

/**
 * RaspisanieSearch represents the model behind the search form of `app\models\Raspisanie`.
 */
class RaspisanieSearch extends Raspisanie
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'group_id', 'user_id'], 'integer'],
            [['time', 'den_nedeli'], 'safe'],
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
        $query = Raspisanie::find();

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
            'time' => $this->time,
            'group_id' => $this->group_id,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'den_nedeli', $this->den_nedeli]);

        return $dataProvider;
    }
}
