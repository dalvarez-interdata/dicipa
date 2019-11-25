<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ProductoCategoria */

$this->title = $model->idProductoCategoria;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Producto Categorias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producto-categoria-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idProductoCategoria], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idProductoCategoria], [
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
            'idProductoCategoria',
            'producto_id_fk',
            'categoria_id_fk',
        ],
    ]) ?>

</div>
