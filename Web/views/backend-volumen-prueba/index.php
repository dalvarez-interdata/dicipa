<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClienteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'volumen_tests');
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
                <?= Html::a(Yii::t('app', Yii::t ('app', 'new_volumen_test') ), ['create'], ['class' => 'btn btn-primary']) ?>
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
                        <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#v-tests" role="tab" aria-selected="true"><span class="hidden-sm-up"><i class="mdi mdi-memory"></i></span> <span class="hidden-xs-down"><?php echo Yii::t ('app', 'volumen_tests')?></span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#periods" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="mdi mdi-tags"></i></span> <span class="hidden-xs-down"><?php echo Yii::t ('app', 'periods')?></span></a> </li>                        
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#periods" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="mdi mdi-tags"></i></span> <span class="hidden-xs-down"><?php echo Yii::t ('app', 'volumen_products')?></span></a> </li>                        
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane p-20 active show" id="v-tests" role="tabpanel">
                           <h3 class="card-title"><?php echo Yii::t ('app', 'list_volumen_tests')?></h3>
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
                                                <div class="table-summary">Total {totalCount} '.Yii::t ('app', 'volumens_test').'</div>
                                            </div>
                                        </div>',
                                    'showHeader' => true,
                                    'filterPosition' => 'FILTER_POS_FOOTER',                          
                                    'dataProvider' => $dataProvider,
                                    'filterModel' => $searchModel,
                                    'columns' => [
                                        'cantidad_min',
                                        'cantidad_max',
                                        'periodoFk.nombre',
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
                        <div class="tab-pane p-20" id="periods" role="tabpanel">
                            <div class="row m-b-20">
                                <div class="col-md-6">
                                    <h3 class="card-title"><?php echo Yii::t ('app', 'list_period')?></h3>
                                </div>
                                <div class="col-md-6 text-right">
                                    <?= Html::a(Yii::t('app', Yii::t ('app', 'new_period') ), ['/backend-periodo/create'], ['class' => 'btn btn-primary']) ?>
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
                                                <div class="table-summary">Total {totalCount} '.Yii::t ('app', 'periods_plural').'</div>
                                            </div>
                                        </div>',
                                    'showHeader' => true,     
                                    'filterPosition' => 'FILTER_POS_FOOTER',                                                    
                                    'dataProvider' => $dataProviderPeriod,
                                    'filterModel' => $searchModelPeriod,
                                    'columns' => [
                                        'nombre',
                                       [
                                            'class' => 'yii\grid\ActionColumn',
                                            'template' => '{view} {update} {delete}',
                                            'headerOptions' => ['width' => '130', 'class' => 'text-center'],
                                            'contentOptions' => ['class' => 'text-center'],                                       
                                            'header'=>'Actions',
                                            'buttons' => [
                                                'update' => function ($url,$model) {
                                                        return Html::a(Yii::t('app', '<span class="mdi mdi-pencil"></span>' ), ['/backend-periodo/update?id=' . $model -> idperiodo ] );
                                                 },
                                                'view' => function ($url,$model,$key) {
                                                    return Html::a(Yii::t('app', '<span class="mdi mdi-eye"></span>' ), ['/backend-periodo/view?id=' . $model -> idperiodo ] );
                                                },
                                                'delete' => function ($url,$model,$key) {
                                                    return Html::a(Yii::t('app', '<span class="mdi mdi-delete"></span>' ), ['/backend-periodo/delete?id=' . $model -> idperiodo ] );;
                                                },                                        
                                            ],                                   
                                        ],
                                    ],
                                ]); ?>                            
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
