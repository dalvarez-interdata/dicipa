<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Respuesta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="respuesta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idpregunta_fk')->textInput() ?>

    <?= $form->field($model, 'texto')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'fecha_creada')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
