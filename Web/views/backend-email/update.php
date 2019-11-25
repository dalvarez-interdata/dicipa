<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Email */

$this->title = Yii::t('app', 'Update Email: ' . $model->idemail, [
    'nameAttribute' => '' . $model->idemail,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Emails'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idemail, 'url' => ['view', 'id' => $model->idemail]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="email-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
