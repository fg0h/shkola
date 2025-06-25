<?php
namespace app\models;

use yii\db\ActiveRecord;

class Zapis extends ActiveRecord
{
    public static function tableName()
    {
        return 'zapis';
    }

    public function rules()
    {
        return [
            [['vozrast', 'gorod', 'course_id'], 'required'],
            [['vozrast', 'gorod'], 'string', 'max' => 255],
            [['course_id', 'user_id'], 'integer'],
        ];
    }

    public static function getCountries()
    {
        return [
            'Россия' => 'Россия',
            'Беларусь' => 'Беларусь',
            'Эстония' => 'Эстония',
        ];
    }

    public static function getCities()
    {
        return [
            'Россия' => [
                'Москва', 'Санкт-Петербург', 'Новосибирск', 'Екатеринбург', 'Нижний Новгород', 'Курган',
                'Казань', 'Челябинск', 'Омск', 'Самара', 'Ростов-на-Дону', 'Уфа', 'Красноярск',
                'Воронеж', 'Пермь', 'Волгоград', 'Краснодар', 'Саратов', 'Тюмень', 'Тольятти',
                'Ижевск', 'Барнаул', 'Ульяновск', 'Иркутск', 'Хабаровск', 'Ярославль', 'Владивосток',
                'Махачкала', 'Томск', 'Оренбург', 'Кемерово', 'Новокузнецк', 'Рязань', 'Набережные Челны',
                'Астрахань', 'Пенза', 'Липецк', 'Киров', 'Чебоксары', 'Калининград', 'Тула', 'Курск'
            ],
            'Беларусь' => ['Минск', 'Гомель', 'Брест', 'Витебск', 'Гродно', 'Могилёв'],
            'Эстония' => ['Таллин', 'Тарту', 'Нарва', 'Пярну'],
        ];
    }
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

}
