<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Cliente */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'period'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-9 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0"><?= Html::encode($model->nombre) ?> </h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo Url::to (['/'])?>"><?php echo Yii::t ('app', 'Home')?></a></li>
            <li class="breadcrumb-item"><a href="<?php echo Url::to (['/backend-volumen-prueba'])?>"><?php echo Yii::t ('app', 'volumen_tests')?></a></li>
            <li class="breadcrumb-item"><a href="<?php echo Url::to (['/backend-periodo'])?>"><?php echo Yii::t ('app', 'periods')?></a></li>
            <li class="breadcrumb-item active"><?= Html::encode($model->nombre) ?></li>
        </ol>
    </div>
    <div class="col-md-3 col-4 align-self-center">
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
                <div class="usuario-view">

                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'nombre',
                        ],
                    ]) ?>

                    <p>
                        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idperiodo], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idperiodo], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => Yii::t('app', 'delete_question'),
                                'method' => 'post',
                            ],
                        ]) ?>
                    </p>                    

                </div>
            </div>
        </div>
    </div>
</div>