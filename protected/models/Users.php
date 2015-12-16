<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "users".
 *
 * @property integer $user_id
 * @property string $username
 * @property string $password_hash
 * @property string $auth_key
 */
class Users extends \yii\db\ActiveRecord implements IdentityInterface
{
    public $password;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['username', 'password'], 'filter', 'filter' => 'trim'],
            [['username'], 'string', 'min' => 3, 'max' => 255],
            [['password'], 'string', 'min' => 6, 'max' => 255],
            [['username'], 'unique', 'message' => 'Это имя занято'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'username' => 'Username',
            'password' => 'Password Hash',
            'auth_key' => 'Auth Key',
        ];
    }

    /* Поиск */

    public function findByUsername($username)
    {
        return static::findOne([
            'username' => $username
        ]);
    }

    /* Хелперы */

    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /* Аутентификация пользователей */

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->user_id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }
}
