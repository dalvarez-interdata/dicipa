<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductoCaracteristica */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="producto-caracteristica-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_producto_fk')->textInput() ?>

    <?= $form->field($model, 'id_caracteristica_fk')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
