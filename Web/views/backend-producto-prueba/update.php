<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductoPrueba */

$this->title = Yii::t('app', 'Update Producto Prueba: ' . $model->idProductoPrueba, [
    'nameAttribute' => '' . $model->idProductoPrueba,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Producto Pruebas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idProductoPrueba, 'url' => ['view', 'id' => $model->idProductoPrueba]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="producto-prueba-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
