<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Categoria */

$this->title = Yii::t('app', 'new_category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0"><?= Html::encode($this->title) ?></h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo Url::to (['/'])?>"><?php echo Yii::t ('app', 'Home')?></a></li>
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
            	<?php if ( $division ):?>
                	<?= Html::a( Yii::t('app', 'Back') , ['/backend-division'], ['class' => 'btn btn-success']) ?>
                <?php else:?>
                	<?= Html::a(Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-success']) ?>
                <?php endif?>
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
                        'divisions' => $divisions,
                        'categories' => $categories,
                        'division' => isset ( $division ) ? $division : null
                    ]) ?>

				</div>
            </div>
        </div>
    </div>
</div>
