<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="producto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idproducto') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'modelo') ?>

    <?= $form->field($model, 'descripcion') ?>

    <?= $form->field($model, 'id_marca_fk') ?>

    <?php // echo $form->field($model, 'id_volumen_prueba_fk') ?>

    <?php // echo $form->field($model, 'id_tipo_producto_fk') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
