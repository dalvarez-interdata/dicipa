<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ProductoCaracteristica */

$this->title = Yii::t('app', 'Create Producto Caracteristica');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Producto Caracteristicas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producto-caracteristica-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
