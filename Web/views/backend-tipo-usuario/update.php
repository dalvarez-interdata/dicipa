<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TipoUsuario */

$this->title = Yii::t('app', 'Update Tipo Usuario: ' . $model->idTipoUsuario, [
    'nameAttribute' => '' . $model->idTipoUsuario,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tipo Usuarios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idTipoUsuario, 'url' => ['view', 'id' => $model->idTipoUsuario]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tipo-usuario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
