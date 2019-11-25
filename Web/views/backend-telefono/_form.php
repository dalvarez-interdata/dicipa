<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Telefono */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="telefono-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'numero')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_tipo_telefono_fk')->textInput() ?>

    <?= $form->field($model, 'id_persona_fk')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
