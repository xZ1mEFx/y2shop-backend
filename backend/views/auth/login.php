<?php
use common\widgets\Alert;
use xz1mefx\adminlte\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model \backend\models\forms\LoginForm */

$this->title = Yii::t('admin-side', 'Login');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="login-box">

    <div class="login-box">
        <div class="login-logo">
            <a href="/"><b>Y2</b>Shop</a>
        </div>

        <?= Alert::widget() ?>

        <div class="login-box-body">
            <p class="login-box-msg"><?= Yii::t('admin-side', 'Sign in to start your session') ?></p>

            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

            <?= $form
                ->field($model, 'email')
                ->textInput([
                    'type' => 'email',
                    'placeholder' => $model->getAttributeLabel('email'),
                ])
                ->glyphIcon('user')
                ->label(FALSE)
            ?>

            <?= $form
                ->field($model, 'password')
                ->passwordInput(['placeholder' => $model->getAttributeLabel('password')])
                ->glyphIcon('lock')
                ->label(FALSE)
            ?>

            <div class="row">
                <div class="col-xs-8">
                    <?= $form->field($model, 'rememberMe')->checkbox() ?>
                </div>
                <div class="col-xs-4">
                    <?= Html::submitButton('Sign in', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
