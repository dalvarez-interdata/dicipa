<?php $this->title = Yii::t('app', 'page_lock_app') . " | " . Yii::$app->name  ?>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use app\models\Usuario;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="login-box card">
    <div class="card-body">

        <?php $form = ActiveForm::begin([
            'options' => ['id'=>'loginform', 'class' => "form-horizontal form-materiall", 'enctype' => 'multipart/form-data'],        
        ]); ?>

        <div class="form-group">
          <div class="col-xs-12 text-center">
            <div class="user-thumb text-center"> 
                <?php echo $model -> getPhoto ('medium', 'img-circle') ?>
              <h3><?= Html::encode($model->personaFk->nombre) ?> <?= Html::encode($model->personaFk->paterno) ?> <?= Html::encode($model->personaFk->materno) ?></h3>
            </div>
          </div>
        </div>

        <div class="form-group ">
          <div class="col-xs-12">
            <?php $model -> password = "" ?>
            <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>            
          </div>
        </div>
        <div class="form-group text-center">
          <div class="col-xs-12">
                <?= Html::submitButton( Yii::t ('app', 'btn_login') .' <i class="mdi mdi-send pull-right"></i>' , ['class' => 'btn btn-primary btn-block text-uppercase', 'name' => 'login-button']) ?>
          </div>
        </div>

        <div class="form-group">
            <div class="d-flex no-block align-items-center">
                <a href="javascript:void(0)" id="to-recover" class="text-muted"><i class="fa fa-lock m-r-5"></i> <?php echo Yii::t ('app', 'link_forgot_password')?></a> 
            </div>
        </div>
        <?php $logged = $model ?>
        <?php ActiveForm::end(); ?>
        <?php $form = ActiveForm::begin([
            'options' => ['id'=>'recoverform', 'action'=> Url::to ('/recover'), 'class' => "form-horizontal form-materiall", 'enctype' => 'multipart/form-data'],        
        ]); ?>
      
        <?php $model = new Usuario ?>
            
            <div class="form-group">
              <div class="col-xs-12 text-center">
                <div class="user-thumb text-center"> 
                    <?php echo $logged -> getPhoto ('medium', 'img-circle') ?>
                  <h3><?= Html::encode($logged->personaFk->nombre) ?> <?= Html::encode($logged->personaFk->paterno) ?> <?= Html::encode($logged->personaFk->materno) ?></h3>
                </div>
              </div>
            </div>

            <div class="form-group m-t-30">
                <div class="col-xs-12">
                    <h3><?php echo Yii::t ('app', 'recover_password')?></h3>
                    <p class="text-muted"><?php echo Yii::t ('app', 'recover_password_help')?> </p>
                </div>
            </div>
            <div class="form-group ">
                <div class="col-xs-12">
                    <?= $form->field($model, 'username')->textInput([ 'placeholder'=> Yii::t ('app', 'field_email') ]) ?>
                </div>
            </div>
            <div class="form-group text-center m-t-20">
                <div class="col-xs-12">
                    <button class="btn btn-primary btn-block text-uppercase waves-effect waves-light" type="submit"><?php echo Yii::t ('app', 'btn_reset')?></button>
                </div>
            </div>

            <div class="col-sm-12 text-center m-t-20">
                <a href="/sign-in" class="text-info m-l-5 iniciate"><b><?php echo Yii::t ('app', 'link_login') ?></b></a>
            </div>               
          
        <?php ActiveForm::end(); ?>     
    </div>
</div>
