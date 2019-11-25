<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Prueba */

$this->title = Yii::t('app', 'Update Prueba: ' . $model->nombre, [
    'nameAttribute' => '' . $model->idprueba,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pruebas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idprueba, 'url' => ['view', 'id' => $model->idprueba]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0"><?= Html::encode($this->title) ?></h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo Url::to (['/'])?>"><?php echo Yii::t ('app', 'Home')?></a></li>
            <li class="breadcrumb-item"><a href="<?php echo Url::to (['/backend-prueba'])?>"><?php echo Yii::t ('app', 'tests')?></a></li>
            <li class="breadcrumb-item active"><?= Html::encode($this->title) ?></li>
        </ol>
    </div>
    <div class="col-md-7 col-4 align-self-center">
        <div class="d-flex m-t-10 justify-content-end">
            <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                <?= Html::a(Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>      
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
				<div class="usuario-create">

				    <?= $this->render('_form', [
				        'model' => $model, 
				    ]) ?>

				</div>
            </div>
        </div>
    </div>
</div>