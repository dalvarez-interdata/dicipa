<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */

$this->title = Html::encode($model->personaFk->nombre);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Usuarios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0"><?= Html::encode($model->personaFk->nombre) ?> <?= Html::encode($model->personaFk->paterno) ?> <?= Html::encode($model->personaFk->materno) ?> </h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo Url::to (['/'])?>"><?php echo Yii::t ('app', 'Home')?></a></li>
            <li class="breadcrumb-item"><a href="<?php echo Url::to (['/backend-usuario'])?>"><?php echo Yii::t ('app', 'users')?></a></li>
            <li class="breadcrumb-item active"><?= Html::encode($model->personaFk->nombre) ?> <?= Html::encode($model->personaFk->paterno) ?> <?= Html::encode($model->personaFk->materno) ?></li>
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

                    <div class="text-center m-b-20">
                        <?php echo $model -> getPhoto ('large','m-t-20 m-b-10 image-circle')?>   <br>               
                        <?= Html::encode($model->personaFk->nombre) ?> <?= Html::encode($model->personaFk->paterno) ?> <?= Html::encode($model->personaFk->materno) ?> <br>
                        <?= Html::encode($model->email) ?>
                    </div>

                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'personaFk.nombre',
                            'personaFk.paterno',
                            'personaFk.materno',
                            'username',
                            'email:email',
                            'tipoUsuarioFk.tipo',
                        ],
                    ]) ?>

                    <div class="row m-b-20">
                        <div class="col-12">
                            <h4 class="help-block block label-division"><?php echo Yii::t ('app', 'user_addresses')?></h4>
                            <?php $domicilios = $model->personaFk -> domicilios ?>
                            <?php if ( $domicilios ):?>
                            <ul class="list-unstyled m-t-20">
                            <?php foreach ( $domicilios as $domicilio ):?>
                                <li> <address><i class="mdi mdi-pin"></i> (<?php echo isset ( $domicilio -> tipodomicilioFk ) ? $domicilio -> tipodomicilioFk -> nombre : '' ?>) <?php echo $domicilio -> direccion?> </address></li>
                            <?php endforeach?> 
                            </ul>
                            <?php else: ?>                        
                                <p class="empty-result"><?php echo Yii::t ('app', 'no_results')?></p>
                            <?php endif?>                                                            
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <h4 class="help-block block label-division"><?php echo Yii::t ('app', 'user_phones')?></h4>
                            <?php $phones = $model->personaFk -> telefonos ?>
                            <?php if ( $phones ):?>
                            <ul class="list-unstyled m-t-20">
                            <?php foreach ( $phones as $phone ):?>
                                <li class="m-b-10"> <a href="tel:<?php echo $phone -> numero?>"><i class="mdi mdi-phone"></i> <?php echo $phone -> numero?> </a> - (<?php echo $phone -> tipoTelefonoFk -> nombre ?>)</li>
                            <?php endforeach?> 
                            </ul>    
                            <?php else: ?>                        
                                <p class="empty-result"><?php echo Yii::t ('app', 'no_results')?></p>
                            <?php endif?>
                        </div>
                        <div class="col-6">
                            <h4 class="help-block block label-division"><?php echo Yii::t ('app', 'user_emails')?></h4>
                            <?php $emails = $model->personaFk -> emails ?>
                             <?php if ( $emails ):?>
                                <ul class="list-unstyled m-t-20">
                                <?php foreach ( $emails as $email ):?>
                                    <li class="m-b-10"> <a href="mailto:<?php echo $email -> direccion?>"><i class="mdi mdi-email"></i> <?php echo $email -> direccion?> </a> </li>
                                <?php endforeach?> 
                                </ul> 
                                <?php else: ?>                        
                                    <p class="empty-result"><?php echo Yii::t ('app', 'no_results')?></p>
                                <?php endif?>                                                           
                        </div>
                    </div>


                    <p class="m-t-40">
                        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idusuario], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idusuario], [
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
