<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductoCategoria */

$this->title = Yii::t('app', 'Update Producto Categoria: ' . $model->idProductoCategoria, [
    'nameAttribute' => '' . $model->idProductoCategoria,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Producto Categorias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idProductoCategoria, 'url' => ['view', 'id' => $model->idProductoCategoria]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="producto-categoria-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
