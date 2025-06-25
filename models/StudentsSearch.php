<?php
namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Students;

class StudentsSearch extends Model
{
    public $id;
    public $first_name;
    public $last_name;
    public $patronymic;
    public $email;
    public $country;
    public $city;
    public $created_at;
    public $updated_at;

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['first_name', 'last_name', 'patronymic', 'email', 'country', 'city', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Students::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'patronymic', $this->patronymic])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'city', $this->city]);

        return $dataProvider;
    }
}

