<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Nota */

$this->title = Yii::t('app', 'Create Nota');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Notas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nota-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
