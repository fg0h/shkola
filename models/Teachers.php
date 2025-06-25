<?php

namespace app\models;

use yii\db\ActiveRecord;

class Teachers extends ActiveRecord
{
    public static function tableName()
    {
        return 'teachers';
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'username' => 'Логин',
            'patronymic' => 'Отчество',
            'specialty' => 'Специализация',
            'education' => 'Образование',
            'created_at' => 'Создан',
            'updated_at' => 'Обновлен',
        ];
    }

}