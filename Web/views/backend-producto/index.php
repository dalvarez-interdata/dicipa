<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'menu_products');
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    table.table td>a {margin-right:10px;display: inline-block;}
    table.table td {vertical-align:middle;}          
</style>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0"><?= Html::encode($this->title) ?></h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo Url::to (['/'])?>"><?php echo Yii::t ('app', 'menu_home')?></a></li>
            <li class="breadcrumb-item active"><?= Html::encode($this->title) ?></li>
        </ol>
    </div>
    <div class="col-md-7 col-4 align-self-center">
        <div class="d-flex m-t-10 justify-content-end">
            <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                <?= Html::a(Yii::t('app', Yii::t ('app', 'new_product') ), ['create'], ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>      
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="usuario-index">

                    <ul class="nav nav-tabs customtab2" role="tablist">
                        <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#products" role="tab" aria-selected="true"><span class="hidden-sm-up"><i class="mdi mdi-memory"></i></span> <span class="hidden-xs-down"><?php echo Yii::t ('app', 'products')?></span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#types" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="mdi mdi-tags"></i></span> <span class="hidden-xs-down"><?php echo Yii::t ('app', 'products_types')?></span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#features" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="mdi mdi-tags"></i></span> <span class="hidden-xs-down"><?php echo Yii::t ('app', 'products_features')?></span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#brands" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="mdi mdi-tags"></i></span> <span class="hidden-xs-down"><?php echo Yii::t ('app', 'brands')?></span></a> </li>                        
                        <?php /*<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tests" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="mdi mdi-tags"></i></span> <span class="hidden-xs-down"><?php echo Yii::t ('app', 'products_test')?></span></a> </li>*/?>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane p-20 active show" id="products" role="tabpanel">
                           <h3 class="card-title"><?php echo Yii::t ('app', 'list_products')?></h3>
                                <?= GridView::widget([
                                    'summary' => '<div class="row">
                                            <div class="col-5">
                                                <div class="input-group table-search-box">
                                                    <input type="text" data-search-items=".grid-view .table tr" data-highlight-text="td" class="form-control" id="search-on-table" placeholder="'.Yii::t ('app', 'type_something').'...">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="ti-search"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-7">
                                                <div class="table-summary">Total {totalCount} '.Yii::t ('app', 'products_plural').'</div>
                                            </div>
                                        </div>',
                                    'showHeader' => true,
                                    'filterPosition' => 'FILTER_POS_FOOTER',
                                    'dataProvider' => $dataProviderProduct,
                                    'filterModel' => $searchModelProduct,
                                    'tableOptions' => ['class' => 'table table-striped'],
                                    'columns' => [
                                        [
                                            'label' => 'Logo',
                                            'value' => function ($model) {
                                                $imagenes = $model -> getImagenes ();
                                                if ( $imagenes ) {
                                                    foreach ($imagenes as $imagen) {
                                                        if ( is_file ( 'uploads/products/prod_' . $model -> idproducto .'/' . $imagen -> imagen ) ) {
                                                            return Html::a( '<img width="64" src="uploads/products/prod_' . $model -> idproducto .'/' . $imagen -> imagen.'" alt="'.$model -> nombre.'">'  , ['view?id=' . $model -> idproducto ], [ ]) ; 
                                                        }
                                                    }
                                                } else {
                                                    return Html::a( '<img width="64" src="images/logo_avatar.png" alt="'.$model -> nombre.'">'  , ['view?id=' . $model -> idproducto ], [ ]) ;                                                    
                                                }
                                            },
                                            'format'=>'raw',
                                        ],                                         
                                        [
                                             'headerOptions' => ['width' => '200'],
                                             'label' => Yii::t ('app', 'product_name'),
                                             'value' => 'nombre',
                                        ],
                                        'modelo',
                                        [
                                             'headerOptions' => ['width' => '400'],
                                             'label' => Yii::t ('app', 'Description'),
                                             'value' => 'descripcion',
                                        ],
                                        'marcaFk.nombre',
                                        'tipoProductoFk.nombre',
                                        [
                                            'class' => 'yii\grid\ActionColumn',
                                            'template' => '{view} {update} {delete}',
                                            'headerOptions' => ['width' => '130', 'class' => 'text-center'],
                                            'contentOptions' => ['class' => 'text-center'],
                                            'header'=>'Actions',
                                            'buttons' => [
                                                'update' => function ($url,$model) {
                                                        return Html::a(
                                                            '<span class="mdi mdi-pencil"></span>', 
                                                            $url);
                                                 },
                                                'view' => function ($url,$model,$key) {
                                                    return Html::a('<span class="mdi mdi-eye"></span>', $url);
                                                },
                                                'delete' => function ($url,$model,$key) {
                                                    return Html::a('<span class="mdi mdi-delete"></span>', $url);
                                                },                                        
                                            ],                                    
                                        ],
                                    ],
                                ]); ?>
                        </div>
                        <div class="tab-pane p-20" id="types" role="tabpanel">
                            <div class="row m-b-20">
                                <div class="col-md-6">
                                    <h3 class="card-title"><?php echo Yii::t ('app', 'list_product_type')?></h3>
                                </div>
                                <div class="col-md-6 text-right">
                                    <?= Html::a(Yii::t('app', Yii::t ('app', 'new_type_product') ), ['/backend-tipo-producto/create'], ['class' => 'btn btn-primary']) ?>
                                </div>
                            </div>
                           
                            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                                <?= GridView::widget([
                                    'summary' => '<div class="row">
                                            <div class="col-5">
                                                <div class="input-group table-search-box">
                                                    <input type="text" data-search-items=".grid-view .table tr" data-highlight-text="td" class="form-control" id="search-on-table" placeholder="'.Yii::t ('app', 'type_something').'...">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="ti-search"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-7">
                                                <div class="table-summary">Total {totalCount} '.Yii::t ('app', 'brands_product_type').'</div>
                                            </div>
                                        </div>',
                                    'showHeader' => true,
                                    'filterPosition' => 'FILTER_POS_FOOTER',                       
                                    'dataProvider' => $dataProviderTipoProducto,
                                    'filterModel' => $searchModelTipoProducto,
                                    'columns' => [
                                        [
                                             'headerOptions' => ['width' => '200'],
                                             'label' => Yii::t ('app', 'type_product'), 
                                             'value' => 'nombre',
                                        ],
                                        [
                                             'headerOptions' => ['width' => '300'],
                                             'label' => Yii::t ('app', 'description'), 
                                             'value' => function ( $model ) {
                                                 if ( strlen ($model -> descripcion) > 150 )
                                                    return substr($model -> descripcion, 0, 150);
                                                else
                                                    return $model -> descripcion;
                                             },
                                        ],
                                        [
                                             'headerOptions' => ['width' => '100', 'class' => 'text-center'],
                                             'contentOptions' => ['class' => 'text-center'],
                                             'label' => Yii::t ('app', 'products'),
                                             'value' => function ($model) {
                                                return count ( $model -> productos );
                                            },
                                        ],                                        
                                    [
                                        'class' => 'yii\grid\ActionColumn',
                                        'template' => '{view} {update} {delete}',
                                        'headerOptions' => ['width' => '130', 'class' => 'text-center'],
                                        'contentOptions' => ['class' => 'text-center'],
                                        'header'=>'Actions',
                                        'buttons' => [
                                            'update' => function ($url,$model) {
                                                    return Html::a(Yii::t('app', '<span class="mdi mdi-pencil"></span>' ), ['/backend-tipo-producto/update?id=' . $model -> idTipoProducto ] );
                                             },
                                            'view' => function ($url,$model,$key) {
                                                return Html::a(Yii::t('app', '<span class="mdi mdi-eye"></span>' ), ['/backend-tipo-producto/view?id=' . $model -> idTipoProducto ] );
                                            },
                                            'delete' => function ($url,$model,$key) {
                                                return Html::a(Yii::t('app', '<span class="mdi mdi-delete"></span>' ), ['/backend-tipo-producto/delete?id=' . $model -> idTipoProducto ] );;
                                            },                                        
                                        ],                                   
                                    ],
                                    ],
                                ]); ?>                         
                        </div>                                                                       
                        <div class="tab-pane p-20" id="features" role="tabpanel">
                           <h3 class="card-title"><?php echo Yii::t ('app', 'list_product_features')?></h3>
                            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                                <?= GridView::widget([
                                    'summary' => '<div class="row">
                                            <div class="col-5">
                                                <div class="input-group table-search-box">
                                                    <input type="text" data-search-items=".grid-view .table tr" data-highlight-text="td" class="form-control" id="search-on-table" placeholder="'.Yii::t ('app', 'type_something').'...">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="ti-search"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-7">
                                                <div class="table-summary">Total {totalCount} '.Yii::t ('app', 'brands_product_type').'</div>
                                            </div>
                                        </div>',
                                    'showHeader' => true,
                                    'filterPosition' => 'FILTER_POS_FOOTER',                          
                                    'dataProvider' => $dataProviderCaracteristica,
                                    'filterModel' => $searchModelCaracteristica,
                                    'columns' => [
                                        ['class' => 'yii\grid\SerialColumn'],
                                        'nombre',
                                        'descripcion',
                                        ['class' => 'yii\grid\ActionColumn'],
                                    ],
                                ]); ?>                             
                        </div>

                        <div class="tab-pane p-20" id="brands" role="tabpanel">
                            <div class="row m-b-20">
                                <div class="col-md-6">
                                    <h3 class="card-title"><?php echo Yii::t ('app', 'brands')?></h3>
                                </div>
                                <div class="col-md-6 text-right">
                                    <?= Html::a(Yii::t('app', Yii::t ('app', 'new_brand') ), ['/backend-marca/create'], ['class' => 'btn btn-primary']) ?>
                                </div>
                            </div>
                           
                            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                                <?= GridView::widget([
                                    'summary' => '<div class="row">
                                            <div class="col-5">
                                                <div class="input-group table-search-box">
                                                    <input type="text" data-search-items=".grid-view .table tr" data-highlight-text="td" class="form-control" id="search-on-table" placeholder="'.Yii::t ('app', 'type_something').'...">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="ti-search"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-7">
                                                <div class="table-summary">Total {totalCount} '.Yii::t ('app', 'brands').'</div>
                                            </div>
                                        </div>',
                                    'showHeader' => true,
                                    'filterPosition' => 'FILTER_POS_FOOTER',                       
                                    'dataProvider' => $dataProviderMarca,
                                    'filterModel' => $searchModelMarca,
                                    'columns' => [
                                        [
                                             'headerOptions' => ['width' => '200'],
                                             'label' => Yii::t ('app', 'brand'), 
                                             'value' => 'nombre',
                                        ],
                                        [
                                             'headerOptions' => ['width' => '300'],
                                             'label' => Yii::t ('app', 'description'), 
                                             'value' => function ( $model ) {
                                                 if ( strlen ($model -> descripcion) > 150 )
                                                    return substr($model -> descripcion, 0, 150);
                                                else
                                                    return $model -> descripcion;
                                             },
                                        ],
                                        [
                                             'headerOptions' => ['width' => '100', 'class' => 'text-center'],
                                             'contentOptions' => ['class' => 'text-center'],
                                             'label' => Yii::t ('app', 'products'),
                                             'value' => function ($model) {
                                                return count ( $model -> productos );
                                            },
                                        ],
                                        [
                                            'class' => 'yii\grid\ActionColumn',
                                            'template' => '{view} {update} {delete}',
                                            'headerOptions' => ['width' => '130', 'class' => 'text-center'],
                                            'contentOptions' => ['class' => 'text-center'],                                            
                                            'header'=>'Actions',
                                            'buttons' => [
                                                'update' => function ($url,$model) {
                                                        return Html::a(Yii::t('app', '<span class="mdi mdi-pencil"></span>' ), ['/backend-marca/update?id=' . $model -> idmarca ] );
                                                 },
                                                'view' => function ($url,$model,$key) {
                                                    return Html::a(Yii::t('app', '<span class="mdi mdi-eye"></span>' ), ['/backend-marca/view?id=' . $model -> idmarca ] );
                                                },
                                                'delete' => function ($url,$model,$key) {
                                                    return Html::a(Yii::t('app', '<span class="mdi mdi-delete"></span>' ), ['/backend-marca/delete?id=' . $model -> idmarca ] );;
                                                },                                        
                                            ],                                    
                                        ],
                                    ],
                                ]); ?>                         
                        </div> 
                       <?php /* <div class="tab-pane p-20" id="tests" role="tabpanel">
                           <h3 class="card-title"><?php echo Yii::t ('app', 'list_tests')?></h3>
                            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                                <?= GridView::widget([
                                    'summary' => '<div class="row">
                                            <div class="col-5">
                                                <div class="input-group table-search-box">
                                                    <input type="text" data-search-items=".grid-view .table tr" data-highlight-text="td" class="form-control" id="search-on-table" placeholder="'.Yii::t ('app', 'type_something').'...">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="ti-search"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-7">
                                                <div class="table-summary">Total {totalCount} '.Yii::t ('app', 'tests').'</div>
                                            </div>
                                        </div>',
                                    'showHeader' => true,
                                    'filterPosition' => 'FILTER_POS_FOOTER',                         
                                    'dataProvider' => $dataProviderTest,
                                    'filterModel' => $searchModelTest,
                                    'columns' => [
                                        ['class' => 'yii\grid\SerialColumn'],
                                        'nombre',
                                        'descripcion',
                                        ['class' => 'yii\grid\ActionColumn'],
                                    ],
                                ]); ?>                             
                        </div>  */?>                       
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


