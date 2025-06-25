<?php

namespace app\models;

use yii\db\ActiveRecord;

class Courses extends ActiveRecord
{
    public static function tableName()
    {
        return 'courses';
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название курса',
            'complexity' => 'Сложность',
            'language' => 'Язык',
            'duration' => 'Длительность',
            'created_at' => 'Создан',
            'updated_at' => 'Обновлен',
        ];
    }
}