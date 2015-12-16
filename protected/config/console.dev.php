<?php
/**
 * Created by PhpStorm.
 * User: EARL
 * Date: 14.12.2015
 * Time: 12:33
 */

$config = [
    'id' => 'custom',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
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
