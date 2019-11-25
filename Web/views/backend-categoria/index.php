<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategoriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'categories');
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
            <?php if ( $division ):?>
                <li class="breadcrumb-item"><a href="<?php echo Url::to (['/backend-division'])?>"><?php echo Yii::t ('app', 'divisions')?></a></li>
                <li class="breadcrumb-item"><a href="<?php echo Url::to (['/backend-division/view?id=' . $division -> iddivision ])?>"><?php echo $division -> nombre ?></a></li>
            <?php endif?>
            <li class="breadcrumb-item active"><?= Html::encode($this->title) ?></li>
        </ol>
    </div>
    <div class="col-md-7 col-4 align-self-center">
        <div class="d-flex m-t-10 justify-content-end">
            <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                <?= Html::a(Yii::t('app', Yii::t ('app', 'new_category') ), ['create'], ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>      
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="usuario-index">

                   <h3 class="card-title">
                        <?php echo isset ( $division ) ? ($division -> getPhoto ('small') .' ') : ''?> 
                        <?php echo isset ( $division ) ? ($division -> nombre.':') : ''?> 
                        <?php echo Yii::t ('app', 'list_categories')?>                            
                    </h3>
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
                                        <div class="table-summary">Total {totalCount} '.Yii::t ('app', 'divisions_plural').'</div>
                                    </div>
                                </div>',
                            'showHeader' => true,
                            'filterPosition' => 'FILTER_POS_FOOTER',                         
                            'dataProvider' => $dataProvider,
                            'filterModel' => $searchModel,
                            'columns' => [
                                [
                                    'label' => 'Code',
                                    'value' => 'abreviatura',
                                    'headerOptions' => ['width' => '150'], 
                                ],                                
                                //['class' => 'yii\grid\SerialColumn'],
                                [
                                    'header'=>'Name',
                                    'value' =>'nombre',   
                                    'headerOptions' => ['width' => '200'],                                 
                                ],
                                [
                                    'header'=>'Description',
                                    'value' => function ($model) {
                                       return substr($model -> descripcion, 0, 200).'...';
                                    },                                 
                                ], 
                                [
                                    'header' => 'Division',
                                    'value'  => 'divisionFk.nombre', 
                                    'headerOptions' => ['width' => '280'],                           
                                ],                                                                                              
                                [
                                    'class' => 'yii\grid\ActionColumn',
                                    'template' => '{view} {update} {delete}',
                                    'headerOptions' => ['width' => '130'],
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
            </div>
        </div>
    </div>
</div>
