<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cliente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cliente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($modelPersona, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelPersona, 'paterno')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($modelPersona, 'materno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <div class="form-group text-right">
        <?= Html::submitButton(Yii::t('app', 'Cancel'), ['class' => 'btn btn-default']) ?>        
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
