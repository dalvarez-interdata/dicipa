<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TipoUsuario */

$this->title = Yii::t('app', 'Create Tipo Usuario');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tipo Usuarios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-usuario-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
