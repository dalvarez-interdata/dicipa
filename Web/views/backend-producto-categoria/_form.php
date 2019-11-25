<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductoCategoria */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="producto-categoria-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'producto_id_fk')->textInput() ?>

    <?= $form->field($model, 'categoria_id_fk')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
