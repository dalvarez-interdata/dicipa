<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
$this->title = 'Login';
?>
<style>
    #loginform .form-group>label {display:none!important}
    .help-block.help-block-error {font-size:.9em!important;color:red;}
    .ml-auto {margin-top:-30px;}
    .app-logo img {width:120px!important}
</style>
<div class="login-box card">
    <div class="card-body">           
        <?php $form = ActiveForm::begin([
            'id' => 'loginform',
            'options' => ['class' => "form-horizontal form-material"],
        ]); ?>

            <a href="<?php echo Url::base()?>" class="text-center db app-logo"><img src="<?php echo $this->theme->baseUrl ?>/assets/images/dicipa-logo.png" alt="<?php echo Html::encode(\Yii::$app->name); ?>" /></a>

            <div class="m-t-20">
                <?= $form->field($model, 'username')->textInput([/*'autofocus' => true,*/ 'placeholder'=> Yii::t ('app', 'field_user_email') ]) ?>
            </div>

            <div class="m-t-30">
                <?= $form->field($model, 'password')->passwordInput(['placeholder'=> Yii::t ('app', 'field_password') ]) ?>
            </div>
           
            <div class="form-group m-t-40">
                <div class="d-flex no-block align-items-center">
                    <div class="checkbox checkbox-primary p-t-0 row ">
                        <?= $form->field($model, 'rememberMe')->checkbox([
                            'class' => 'filled-in',
                            'template' => "<div class=\"col-lg-12\">{input} {label}</div>\n<div class=\"col-lg-12\">{error}</div>",
                        ]) ?>
                    </div>
                    <div class="ml-auto">
                        <a href="" id="to-recover" class="text-muted"><i class="fa fa-lock m-r-5"></i> <?php echo Yii::t ('app', 'link_forgot_password')?></a> 
                    </div>
                </div>
            </div>
        

            <div class="form-group">
                <?= Html::submitButton( Yii::t ('app', 'btn_login') .' <i class="mdi mdi-send pull-right"></i>' , ['class' => 'btn btn-primary btn-block text-uppercase', 'name' => 'login-button']) ?>
            </div>

        <?php ActiveForm::end(); ?>

        <form class="form-horizontal" id="recoverform" action="index.html">
            <div class="form-group ">
                <div class="col-xs-12">
                    <h3><?php echo Yii::t ('app', 'recover_password')?></h3>
                    <p class="text-muted"><?php echo Yii::t ('app', 'recover_password_help')?> </p>
                </div>
            </div>
            <div class="form-group ">
                <div class="col-xs-12">
                    <input class="form-control" type="text" required="" placeholder="<?php echo Yii::t ('app', 'field_email')?>">
                </div>
            </div>
            <div class="form-group text-center m-t-20">
                <div class="col-xs-12">
                    <button class="btn btn-primary btn-block text-uppercase waves-effect waves-light" type="submit"><?php echo Yii::t ('app', 'btn_reset') ?></button>
                </div>
            </div>
            <div class="col-sm-12 text-center m-t-20">
                <a href="/sign-in" class="text-info m-l-5 iniciate"><b><?php echo Yii::t ('app', 'link_login') ?></b></a>
            </div>            
        </form>            
    </div>
</div>
<script>
    jQuery (document).ready (function () {
        jQuery ("#to-recover").on("click",function(e){
            e.preventDefault ();
            jQuery ("#loginform").fadeOut(function () {
                jQuery ("#recoverform").fadeIn()
            });
            
        }) ;
        jQuery(".iniciate").on("click",function(e){
            e.preventDefault ();
            jQuery("#recoverform").fadeOut(function () {
                jQuery("#loginform").fadeIn(); 
            })
                       
        })              
    })
</script>