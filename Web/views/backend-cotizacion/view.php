<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Cotizacion */

$this->title = $model->idcotizacion;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cotizacions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cotizacion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idcotizacion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idcotizacion], [
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
            'idcotizacion',
            'id_usuario_fk',
            'id_cliente_fk',
            'id_producto_fk',
        ],
    ]) ?>

</div>
