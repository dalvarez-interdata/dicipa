<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TipoDomicilio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipo-domicilio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <div class="form-group text-right">
        <?= Html::submitButton(Yii::t('app', 'Cancel'), ['class' => 'btn btn-default']) ?>        
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
