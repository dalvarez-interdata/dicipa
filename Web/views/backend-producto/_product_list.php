<?php 

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

?>
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
    'showHeader' => false,
    'dataProvider' => $dataProviderProduct,
    'filterModel' => $searchModelProduct,
    'tableOptions' => ['class' => 'table table-striped'],
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        //'idusuario',
        'nombre',
        'modelo',
        'descripcion:ntext',
        'marcaFk.nombre',
        'tipoProductoFk.nombre',
        ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>   