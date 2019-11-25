<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Cliente */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'brands'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .pull-left {float:left}
</style>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0"><?= Html::encode($model->nombre) ?> </h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo Url::to (['/'])?>"><?php echo Yii::t ('app', 'Home')?></a></li>
            <li class="breadcrumb-item"><a href="<?php echo Url::to (['/backend-producto'])?>"><?php echo Yii::t ('app', 'menu_product')?></a></li>
            <li class="breadcrumb-item"><a href="<?php echo Url::to (['/backend-tipo-producto'])?>"><?php echo Yii::t ('app', 'menu_product_type')?></a></li>
            <li class="breadcrumb-item active"><?= Html::encode($model->nombre) ?></li>
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
                <div class="usuario-view">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'nombre',
                            'descripcion',
                        ],
                    ]) ?>

                    <div class="row m-b-20 m-t-30">
                        <div class="col-12">
                            <h4 class="help-block block label-division"><?php echo Yii::t ('app', 'products')?></h4>
                            <?php $products = $model->productos ?>
                            <?php if ( $products ):?>
                            <ul class="list-unstyled m-t-20">
                            <?php foreach ( $products as $product ):?>
                                <li class="m-b-10">
                                    <?php 
                                        $imagenes = $product -> getImagenes ();
                                        if ( $imagenes ) {
                                            foreach ($imagenes as $imagen) {
                                                if ( is_file ( 'uploads/products/prod_' . $product -> idproducto .'/' . $imagen -> imagen ) ) {
                                                    echo '<div class="pull-left m-r-20">' . Html::a( '<img class="" width="64" src="/uploads/products/prod_' . $product -> idproducto .'/' . $imagen -> imagen.'" alt="'.$product -> nombre.'">'  , ['view?id=' . $product -> idproducto ], [ ]) .'</div>';
                                                    break;
                                                }
                                            }
                                        } else {
                                            echo Html::a( '<div class="pull-left m-r-20"><img class="m-r-20 pull-left" width="64" src="/images/logo_avatar.png" alt="'.$product -> nombre.'"></div>'  , ['view?id=' . $product -> idproducto ], [ ]) ;                                                    
                                        }                                    
                                    ?>                                    
                                    <?php echo Html::a( $product -> nombre, ['/backend-producto/view?id=' . $product -> idproducto ] )?>
                                    <?php echo '<small><br>'.$product -> marcaFk -> nombre.'</small>'; ?>
                                    <div class="clearfix"></div>
                                </li>
                            <?php endforeach?> 
                            </ul>
                            <?php else: ?>                        
                                <p class="empty-result"><?php echo Yii::t ('app', 'no_results')?></p>
                            <?php endif?>                                                            
                        </div>
                    </div>


                    <p>
                        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idTipoProducto], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idTipoProducto], [
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

