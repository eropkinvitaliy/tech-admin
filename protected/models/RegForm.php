<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 16.12.2015
 * Time: 9:59
 */

namespace app\models;

use yii\Base\Model;
use yii;
use app\models\Users;

class RegForm extends Model
{
    public $username;
    public $password;

    public function rules()
    {
        return [
//            [['username', 'password'], 'required'],
//            [['username', 'password'], 'filter', 'filter' => 'trim'],
//            ['username', 'string', 'min' => 3, 'max' => 255],
//            ['username', 'unique', 'targetClass' => Users::className(),
//                'message' => 'Это имя занято'],
//            ['password', 'string', 'min' => 6, 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Имя пользователя',
            'password' => 'Пароль',
        ];
    }

    public function reg()
    {
        $user = new Users();
        $user->username = $this->username;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->save();
        return $user;
    }

}