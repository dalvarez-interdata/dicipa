<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TelefonoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="telefono-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idtelefono') ?>

    <?= $form->field($model, 'numero') ?>

    <?= $form->field($model, 'id_tipo_telefono_fk') ?>

    <?= $form->field($model, 'id_persona_fk') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
