<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ProductoCaracteristica */

$this->title = $model->idProductoCaracteristica;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Producto Caracteristicas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producto-caracteristica-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idProductoCaracteristica], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idProductoCaracteristica], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idProductoCaracteristica',
            'id_producto_fk',
            'id_caracteristica_fk',
        ],
    ]) ?>

</div>
