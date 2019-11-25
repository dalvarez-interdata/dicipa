<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Telefono */

$this->title = Yii::t('app', 'Update Telefono: ' . $model->idtelefono, [
    'nameAttribute' => '' . $model->idtelefono,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Telefonos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idtelefono, 'url' => ['view', 'id' => $model->idtelefono]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="telefono-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
