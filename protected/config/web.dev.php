<?php
/**
 * Created by PhpStorm.
 * User: EARL
 * Date: 02.12.2015
 * Time: 15:21
 */

$config = [
    'id' => 'custom',
    'basePath' => dirname(__DIR__),
    'language' => 'ru_RU',
    'charset' => 'UTF-8',
    'params' => require (__DIR__ . '/params.php'),
    'bootstrap' => ['log'],
    'components' => [
        'urlManager' => [
            'showScriptName' => false,
            'enablePrettyUrl' => true,
            'rules' => [
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ],
        ],
        'request' => [
            'cookieValidationKey' => 'prokma.ru',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
    ],
];

if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;