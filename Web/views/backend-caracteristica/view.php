<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Caracteristica */

$this->title = $model->idcaracteristica;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Caracteristicas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="caracteristica-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idcaracteristica], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idcaracteristica], [
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
            'idcaracteristica',
            'nombre',
            'descripcion:ntext',
        ],
    ]) ?>

</div>
