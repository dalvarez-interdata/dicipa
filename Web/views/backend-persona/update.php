<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Persona */

$this->title = Yii::t('app', 'Update Persona: ' . $model->idpersona, [
    'nameAttribute' => '' . $model->idpersona,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Personas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idpersona, 'url' => ['view', 'id' => $model->idpersona]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="persona-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
