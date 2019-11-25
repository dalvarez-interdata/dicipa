<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Division */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0"><?= Yii::t('app', 'categories') ?></h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo Url::to (['/'])?>"><?php echo Yii::t ('app', 'menu_home')?></a></li>
            <li class="breadcrumb-item"><a href="<?php echo Url::to (['/backend-categoria'])?>"><?= Yii::t('app', 'categories') ?></a></li>
            <li class="breadcrumb-item active"><?= $this->title ?></li>
        </ol>
    </div>      
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="usuario-index">

                    <div class="division-view">
                        <h3 class="m-b-20">
                            <?= Html::encode($this->title) ?>                                
                            <br>
                            <small><a href="<?php echo Url::to (['/backend-division/view?id=' . $model -> divisionFk -> iddivision ])?>"><?php echo $model -> divisionFk -> nombre ?></a></small>
                        </h3>
                        <p><?php echo $model -> descripcion ?></p>
                        <?php if ( $model -> categoriaFk ):?>
                            <p><?php echo Yii::t ('app', 'parent')?>: <?php echo $model -> categoriaFk -> nombre ?></p>
                        <?php endif?>
                        <p>
                            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idcategoria], ['class' => 'btn btn-primary']) ?>
                            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idcategoria], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                                    'method' => 'post',
                                ],
                            ]) ?>
                        </p>

                    </div>
            </div>
        </div>
    </div>
</div>