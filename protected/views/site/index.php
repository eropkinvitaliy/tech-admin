<?php
use yii\widgets\Menu;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $user app\models\Users */
/* @var $form ActiveForm */

if (Yii::$app->user->isGuest){
    $menuItems[] = ['label' => 'Регистрация', 'url' => ['/site/reg']];
    $menuItems[] = ['label' => 'Войти', 'url' => ['/site/login']];
}
else {
    $menuItems[] = ['label' => 'Пользователи', 'url' => ['#'], 'items' => [
        ['label' => 'Регистрация', 'url' => ['site/reg']],
        ['label' => 'Список', 'url' => ['#']],
        ['label' => 'Разрешения', 'url' => ['#']],
        ['label' => 'Группы', 'url' => ['#']],
    ]];
    $menuItems[] = ['label' => 'Выйти ('. Yii::$app->user->identity['username'].')',
        'url' => ['#'],
        'linkOptions' => ['data-metod' => 'post']
    ];
}
echo Menu::widget([
    'items' => $menuItems,
    'activateParents' => true,
    'activateItems' => true,
    'encodeLabels' => false,
    'options' => [
        'class' => 'navmenu navmenu-default navmenu-fixed-left offcanvas'
    ]
]);

?>