<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Division */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Divisions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    ul.categories {margin:0;padding:0;list-style:none}
    ul.categories li span.abbr-circle {display:inline-block;width:28px;height:28px;border-radius:50%;background:#3dacec;color:#fff;border:1px solid #fff;font-size:.8em;text-align: center;line-height:25px}
    ul.categories li span.abbr-circle.div-2 {background:#b12932;}
    ul.categories li span.abbr-circle.div-3 {background:#a1a3a7;}
    ul.categories li span.abbr-circle.div-4 {background:#71541c;}
    li.line-vertical {height:20px;border-left:2px solid #ddd;margin-left:12px;margin-top:5px;margin-bottom:5px}
    li.line-vertical:last-child {border-left:0!important}
    a.link-category {color:#67757c;position:relative;top:2px;margin-left:10px}
</style>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 col-12 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0"><?= Yii::t('app', 'divisions') ?></h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo Url::to (['/'])?>"><?php echo Yii::t ('app', 'menu_home')?></a></li>
            <li class="breadcrumb-item"><a href="<?php echo Url::to (['/backend-division'])?>"><?= Yii::t('app', 'divisions') ?></a></li>
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
                            <?php if ( $model -> imagen != "" ):?>
                                <?php echo $model -> getPhoto ('medium','img-responsive pull-left')?>  
                            <?php endif ?>                           
                            <?= Html::encode($this->title) ?>                                
                        </h3>
                        <p>
                            <?php echo $model -> descripcion ?>
                        </p>
                        <h4 class="m-b-20"><?php echo Yii::t ('app', 'categories')?></h4>
                        <ul class="categories m-t-10">
                            <?php foreach ( $model -> getCategorias() as $category ):?>
                                <li><span class="abbr-circle div-<?php echo $model -> iddivision?>"><?php echo  $category -> abreviatura ?></span> <a class="link-category" href="<?php echo Url::to (['/backend-categoria/view?id=' . $category -> idcategoria ])?>"
                                    ><?php echo  $category -> nombre ?></a>
                                    <a class="link-category" href="<?php echo Url::to (['/backend-categoria/update?id=' . $category -> idcategoria ])?>"
                                    ><i class="mdi mdi-pencil"></i></a>

                                </li>
                                <li class="line-vertical"></li>
                            <?php endforeach ?>
                        </ul>
                        <div class="m-t-30">
                            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->iddivision], ['class' => 'btn btn-primary']) ?>
                            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->iddivision], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                                    'method' => 'post',
                                ],
                            ]) ?>
                        </div>

                    </div>
            </div>
        </div>
    </div>
</div>