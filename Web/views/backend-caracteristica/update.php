<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Caracteristica */

$this->title = Yii::t('app', 'Update Caracteristica: ' . $model->idcaracteristica, [
    'nameAttribute' => '' . $model->idcaracteristica,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Caracteristicas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idcaracteristica, 'url' => ['view', 'id' => $model->idcaracteristica]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="caracteristica-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
