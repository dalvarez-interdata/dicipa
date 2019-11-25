<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Categoria */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categoria-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
    	<div class="col-md-6">
    		<?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
    	</div>
    	<div class="col-md-6">
    		<?= $form->field($model, 'abreviatura')->textInput(['maxlength' => true]) ?>
    	</div>
    </div>
	

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>


	<div class="form-group field-categoria-id_division_fk">
		<label class="control-label" for="categoria-id_division_fk"><?php echo Yii::t ('app', 'division')?></label>
		<select name="Categoria[id_division_fk]" class="form-control">
			<?php foreach ( $divisions as $division ):?>
				<option <?php echo $model -> id_division_fk == $division -> iddivision || ( isset ( $_GET['id_division'] ) && $_GET['id_division'] == $division -> iddivision )? 'selected' : ''?> value="<?php echo $division -> iddivision ?>"><?php echo $division -> nombre ?></option>
			<?php endforeach?>
		</select>
		<div class="help-block"></div>
	</div>

	<div class="form-group field-categoria-id_categoria_fk">
		<label class="control-label" for="categoria-id_categoria_fk"><?php echo Yii::t ('app', 'parent')?></label>
		<select name="Categoria[id_categoria_fk]" class="form-control">
			<option value=""><?php echo Yii::t ('app', 'select')?></option>
			<?php foreach ( $categories as $category ):?>
				<option <?php echo $model -> id_categoria_fk  ==  $category -> idcategoria ? 'selected' : ''?> value="<?php echo $category -> idcategoria ?>"><?php echo $category -> nombre ?></option>
			<?php endforeach?>
		</select>
		<div class="help-block"></div>
	</div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
