<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DomicilioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="domicilio-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'iddomicilio') ?>

    <?= $form->field($model, 'direccion') ?>

    <?= $form->field($model, 'id_tipodomicilio_fk') ?>

    <?= $form->field($model, 'id_persona_fk') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
