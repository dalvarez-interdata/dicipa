<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductoCaracteristicaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="producto-caracteristica-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idProductoCaracteristica') ?>

    <?= $form->field($model, 'id_producto_fk') ?>

    <?= $form->field($model, 'id_caracteristica_fk') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
