<?php
/**
 * Created by PhpStorm.
 * User: EARL
 * Date: 02.12.2015
 * Time: 15:50
 */

use yii\helpers\Html;
use app\assets\AppAsset;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>"/>
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

</head>
<body>
<?php $this->beginBody() ?>

<?= $content ?>

<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
