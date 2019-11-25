<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Caracteristica */

$this->title = Yii::t('app', 'Create Caracteristica');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Caracteristicas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="caracteristica-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
