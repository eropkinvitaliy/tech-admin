<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 16.12.2015
 * Time: 10:11
 */

namespace app\models;

use yii\base\Model;
use Yii;

class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    public function rules()
    {
        return [
            [['username', 'password'], 'required', 'on' => 'default'],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword'],
        ];
    }

    public function validatePassword($attribute)
    {
        if(!$this->hasErrors()){
            if ($this->password != '123456'){
                $this->addError($attribute,'Не правильное имя пользователя или пароль');
            }
        }
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Имя пользователя',
            'password' => 'Пароль',
            'rememberMe' => 'Запомнить меня',
        ];
    }

    public function login()
    {
        if ($this->validate()) {
            return true;
        }
        else {
            return false;
        }
    }
}