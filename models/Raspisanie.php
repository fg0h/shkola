<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Raspisanie extends ActiveRecord
{
    public static function tableName()
    {
        return 'raspisanie';
    }

    public function rules()
    {
        return [
            [['time', 'den_nedeli', 'group_id', 'user_id'], 'required'],
        ];
    }
    public function getGroup()
    {
        return $this->hasOne(Groups::class, ['id' => 'group_id']);
    }
    public function getUser()
    {
        return $this->hasOne(\app\models\User::class, ['id' => 'user_id']);
    }

    public function getRaspisanie()
    {
        return $this->hasMany(Raspisanie::class, ['user_id' => 'id']);
    }

}
