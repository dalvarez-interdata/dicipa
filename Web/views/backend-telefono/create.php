<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Telefono */

$this->title = Yii::t('app', 'Create Telefono');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Telefonos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="telefono-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
