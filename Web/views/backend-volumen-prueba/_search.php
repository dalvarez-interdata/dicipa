<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VolumenPruebaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="volumen-prueba-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idVolumenPrueba') ?>

    <?= $form->field($model, 'cantidad_min') ?>

    <?= $form->field($model, 'cantidad_max') ?>

    <?= $form->field($model, 'id_periodo_fk') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
