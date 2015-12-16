<?php
/**
 * Created by PhpStorm.
 * User: EARL
 * Date: 10.12.2015
 * Time: 9:50
 */

namespace app\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = ['/css/signin.css'
    ];
    public $js = [
    ];
    public $depends = [
        'yii\bootstrap\BootstrapAsset',
    ];
}
