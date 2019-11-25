<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ProductoPrueba */

$this->title = Yii::t('app', 'Create Producto Prueba');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Producto Pruebas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producto-prueba-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
