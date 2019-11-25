<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductoCaracteristica */

$this->title = Yii::t('app', 'Update Producto Caracteristica: ' . $model->idProductoCaracteristica, [
    'nameAttribute' => '' . $model->idProductoCaracteristica,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Producto Caracteristicas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idProductoCaracteristica, 'url' => ['view', 'id' => $model->idProductoCaracteristica]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="producto-caracteristica-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
