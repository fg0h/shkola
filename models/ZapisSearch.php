<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\zapis;

/**
 * ZapisSearch represents the model behind the search form of `app\models\zapis`.
 */
class ZapisSearch extends \app\models\Zapis
{
    public $username;
    public $surname;
    public $patronymic;
    public $email;
    public $vozrast;

    public function rules()
    {
        return [
            [['id', 'course_id', 'group_id', 'user_id'], 'integer'],
            [['username', 'surname', 'patronymic', 'email', 'strana', 'vozrast' ,'gorod'], 'safe'],
        ];
    }

    public function attributes()
    {
        // Добавляем атрибуты из связанной модели user
        return array_merge(parent::attributes(), ['username', 'surname', 'patronymic', 'email']);
    }

    public function search($params)
    {
        $query = zapis::find();
        $query->joinWith(['user']); // присоединяем таблицу пользователей

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['username'] = [
            'asc' => ['user.username' => SORT_ASC],
            'desc' => ['user.username' => SORT_DESC],
        ];
        // Можно добавить сортировку для surname, email и т.д.

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'course_id' => $this->course_id,
            'group_id' => $this->group_id,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'user.username', $this->username])
            ->andFilterWhere(['like', 'user.surname', $this->surname])
            ->andFilterWhere(['like', 'user.patronymic', $this->patronymic])
            ->andFilterWhere(['like', 'user.email', $this->email])
            ->andFilterWhere(['like', 'strana', $this->strana])
            ->andFilterWhere(['like', 'vozrast', $this->vozrast])
            ->andFilterWhere(['like', 'gorod', $this->gorod]);

        return $dataProvider;
    }

}
