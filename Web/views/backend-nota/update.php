<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Nota */

$this->title = Yii::t('app', 'Update Nota: ' . $model->idnotas, [
    'nameAttribute' => '' . $model->idnotas,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Notas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idnotas, 'url' => ['view', 'id' => $model->idnotas]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="nota-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
