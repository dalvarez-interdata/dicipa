<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cotizacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cotizacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_usuario_fk')->textInput() ?>

    <?= $form->field($model, 'id_cliente_fk')->textInput() ?>

    <?= $form->field($model, 'id_producto_fk')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
