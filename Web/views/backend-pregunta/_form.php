<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pregunta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pregunta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'enunciado')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'fecha_creada')->textInput() ?>

    <?= $form->field($model, 'idcotizacion_fk')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
