<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Menu;

/* @var $this yii\web\View */
/* @var $model app\models\LoginForm */
/* @var $form ActiveForm */

?>


<div class="contagner">

    <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'options' => ['class' => 'form-signin'],
        ]
    ); ?>
    <?= $form->field($model, 'username') ?>
    <?= $form->field($model, 'password')->passwordInput() ?>
    <?= $form->field($model, 'rememberMe')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- login -->
