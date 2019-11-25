<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TipoProducto */

$this->title = Yii::t('app', 'Update Tipo Producto: ' . $model->idTipoProducto, [
    'nameAttribute' => '' . $model->idTipoProducto,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tipo Productos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idTipoProducto, 'url' => ['view', 'id' => $model->idTipoProducto]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tipo-producto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
