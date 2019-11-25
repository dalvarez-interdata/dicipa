<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pregunta */

$this->title = Yii::t('app', 'Create Pregunta');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Preguntas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pregunta-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
