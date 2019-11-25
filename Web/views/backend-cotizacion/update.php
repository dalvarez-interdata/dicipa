<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cotizacion */

$this->title = Yii::t('app', 'Update Cotizacion: ' . $model->idcotizacion, [
    'nameAttribute' => '' . $model->idcotizacion,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cotizacions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idcotizacion, 'url' => ['view', 'id' => $model->idcotizacion]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="cotizacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
