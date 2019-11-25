<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NotaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nota-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idnotas') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'contenido') ?>

    <?= $form->field($model, 'fecha') ?>

    <?= $form->field($model, 'hora') ?>

    <?php // echo $form->field($model, 'usuario_fk') ?>

    <?php // echo $form->field($model, 'cotizacion_fk') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
