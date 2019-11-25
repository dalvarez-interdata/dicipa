<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Division */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="division-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>
    <div class="form-group">
	    <div>
	    	<?php if ( $model -> imagen != "" ):?>
	        <span data-toggle="tooltip"><?php echo $model -> getPhoto ('large','img-responsive')?></span>   
	        <br>  
	    	<?php endif?>
	        <?= $form->field($model, 'imagenFile')->fileInput() ?>        
	    </div> 
	 </div>

    <div class="form-group text-right">
        <?= Html::submitButton(Yii::t('app', 'Cancel'), ['class' => 'btn btn-default']) ?>        
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-primary']) ?>       
    </div>

    <?php ActiveForm::end(); ?>

</div>
