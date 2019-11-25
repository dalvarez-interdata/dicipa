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
<style>
    #product-images-carousel {background:#eee}
    #product-images-carousel img {min-height:300px}
</style>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0"><?= Html::encode($model->nombre) ?> </h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo Url::to (['/'])?>"><?php echo Yii::t ('app', 'Home')?></a></li>
            <li class="breadcrumb-item"><a href="<?php echo Url::to (['/backend-producto'])?>"><?php echo Yii::t ('app', 'products')?></a></li>
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
                <h3><?php echo $model -> nombre ?></h3>
                <div class="usuario-view">

                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'nombre',
                            'tipoProductoFk.nombre', 
                            'marcaFk.nombre',
                            'modelo',
                            'descripcion',
                        ],
                    ]) ?>

                    <div class="row">
                        <div class="col-md-4">
                            <div id="chosen-product-categories" class="m-b-10 m-t-10 p-relative">
                                <h4 class="text-bold label-division"><?php echo Yii::t ('app', 'categories')?></h4>
                                <div class="form-group-container m-t-10">    
                                    <?php $categories = $model -> productoCategorias ?>
                                    <?php if ( $categories ):?>
                                        <div class="row m-t-10">                     
                                            <div class="col-12">                   
                                                <?php foreach ( $categories as $category ):?><span class="badge badge-primary"><?php echo $category -> categoriaIdFk -> nombre ?></span>
                                                <?php endforeach?>
                                            </div>
                                        </div>                                        
                                    <?php else:?>
                                        <div class="empty"><?php echo Yii::t ('app', 'not_result_found')?></div>
                                    <?php endif?>
                                </div>
                            </div>                                
                        </div>  

                        <div class="col-md-4">
                            <div id="chosen-product-features" class="m-b-10 m-t-10 p-relative">
                                <h4 class="label-division text-bold"><?php echo Yii::t ('app', 'features')?></h4>
                                <div class="form-group-container m-t-10">    
                                    <?php $features = $model -> productoCaracteristicas ?>
                                    <?php if ( $features ):?>
                                        <div class="row m-t-10">
                                            <div class="col-12">                                        
                                                <?php foreach ( $features as $feature ):?>
                                                       <span class="badge badge-primary"><?php echo $feature -> caracteristicaFk -> nombre ?></span>
                                                <?php endforeach?>
                                            </div>
                                        </div>                                                                                
                                    <?php else:?>
                                        <div class="empty"><?php echo Yii::t ('app', 'not_result_found')?></div>
                                    <?php endif?>

                                </div>
                            </div>                                
                        </div> 

                        <div class="col-md-4">
                            <div id="chosen-product-features" class="m-b-10 m-t-10 p-relative">
                                <h4 class="label-division text-bold"><?php echo Yii::t ('app', 'tests')?></h4>
                                <div class="form-group-container m-t-10">    
                                    <?php $tests = $model -> productoPruebas ?>
                                    <?php if ( $tests ):?>
                                        <div class="row m-t-10">
                                            <div class="col-12">                                        
                                                <?php foreach ( $tests as $test ):?>
                                                       <span class="badge badge-primary"><?php echo $test -> pruebaIdFk -> nombre ?></span>
                                                <?php endforeach?>
                                            </div>
                                        </div>                                                                                
                                    <?php else:?>
                                        <div class="empty"><?php echo Yii::t ('app', 'not_result_found')?></div>
                                    <?php endif?>

                                </div>
                            </div>                                
                        </div>                                       
                    </div>  

                    <div class="row">                  
                        <div class="col-md-4 m-t-20">
                            <h4 class="label-division text-bold"><?php echo Yii::t ('app', 'product_gallery')?></h4>
                            <?php $images = $model -> getImagenes ()?>
                            <div id="product-images-carousel" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <?php foreach ( $images as $image ):?>
                                        <?php $i = 0 ?>
                                        <?php  if ( is_file ( 'uploads/products/prod_' . $model -> idproducto .'/' . $image -> imagen ) ): ?>
                                            <li data-target="#product-images-carousel" data-slide-to="<?php echo $i ?>" class="<?php echo $i == 0 ? 'active' : ''?>"></li> 
                                            <?php $i++ ?>               
                                        <?php endif?>                        
                                    <?php endforeach ?>
                                </ol>
                                <div class="carousel-inner" role="listbox">
                                    <?php $i = 0 ?>
                                    <?php foreach ( $images as $image ):?>
                                        <?php  if ( is_file ( 'uploads/products/prod_' . $model -> idproducto .'/' . $image -> imagen ) ): ?>
                                            <div class="carousel-item <?php echo $i == 0 ? 'active' : ''?>">
                                                <img class="img-responsive" src="<?php echo '/uploads/products/prod_' . $model -> idproducto .'/' . $image -> imagen ?>" alt="<?php echo $model -> nombre ?>">
                                            </div>
                                            <?php $i++ ?>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </div>
                                <a class="carousel-control-prev" href="#product-images-carousel" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#product-images-carousel" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>                         
                        </div>
                    </div>

                    <p class="m-t-40">
                        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idproducto], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idproducto], [
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