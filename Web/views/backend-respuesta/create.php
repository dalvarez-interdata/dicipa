<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Respuesta */

$this->title = Yii::t('app', 'Create Respuesta');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Respuestas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="respuesta-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
