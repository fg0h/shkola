<?php

namespace app\models;

use app\models\User;
use Yii;
use yii\base\Model;

class Signup extends Model
{
    public $username;
    public $password;
    public $email;
    public $first_name;
    public $last_name;
    public $date_birthd;
    public $phone;
    public $role;
    public $password_repair;

    public function rules()
    {
        return [
            [['username', 'password','first_name', 'last_name', 'date_birthd', 'phone'], 'required'],
            ['password_repair', 'compare', 'compareAttribute' => 'password'],
            ['email', 'email'],
            ['role', 'in', 'range' => [0, 1, 2]],
            ['role', 'required'],
        ];
    }

    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->date_birthd = $this->date_birthd;
        $user->phone = $this->phone;
        $user->role = $this->role;
        $user->password = Yii::$app->getSecurity()->generatePasswordHash($this->password);
        return $user->save() ? $user : null;
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Никнейм',
            'email' => 'Почта',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'date_birthd' => 'Дата рождения (гггг-мм-дд)',
            'phone' => 'Телефон',
            'password' => 'Пароль',
            'password_repair' => 'Повтор пароля',
        ];
    }
}
