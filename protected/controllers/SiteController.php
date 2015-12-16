<?php
/**
 * Created by PhpStorm.
 * User: EARL
 * Date: 02.12.2015
 * Time: 15:23
 */

namespace app\controllers;

use yii\web\Controller;
use app\models\RegForm;
use app\models\LoginForm;
use Yii;

class SiteController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionReg()
    {
        $model = new RegForm();

        if($model->load(Yii::$app->request->post()) && $model->validate()){
            ?><pre><?php var_dump($model);
            $model->load($_POST);
            var_dump($model);
            die;?></pre><?php
//            $model->username = Yii::$app->request->post('RegForm')['username'];
//            $model->password = Yii::$app->request->post('RegForm')['password'];
            if($user = $model->reg()){
                if (Yii::$app->getUser()->login($user)){
                    return $this->render('index', [
                        'user' => $user
                    ]);
                }
            }
            else {
                Yii::$app->session->setFlash('error', 'Возникла ошибка при регистрации');
                Yii::error('Ошибка регистрации');
                return $this->refresh();
            }
        }
        return $this->render(
            'users\reg', ['model' => $model]
        );
    }

    public function actionLogin()
    {
        $model = new LoginForm();
        if($model->load(Yii::$app->request->post()) && $model->login()){
                return $this->goBack();
        }
        return $this->render(
            'users\login', ['model' => $model]
        );
    }

}
