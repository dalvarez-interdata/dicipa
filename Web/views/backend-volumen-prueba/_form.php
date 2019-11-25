<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VolumenPrueba */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="volumen-prueba-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput() ?>

    <div class="row">
    	<div class="col-md-6">
    		<?= $form->field($model, 'cantidad_min')->textInput() ?>
    	</div>
    	<div class="col-md-6">
    		<?= $form->field($model, 'cantidad_max')->textInput() ?>	
    	</div>
    </div>

    <?= $form->field($model, 'id_periodo_fk')->dropDownList ( $periods ) ?>
    <div class="m-b-10" style="position:relative;top:-15px"><?= Html::a(Yii::t('app', Yii::t ('app', 'add_period') ), ['/backend-periodo/create'], [] ) ?></div>


	<div class="form-group field-categoria-id_division_fk">
		<label class="control-label" for="categoria-id_division_fk"><?php echo Yii::t ('app', 'division')?></label>
		<select name="VolumenPrueba[id_division_fk]" class="form-control">
			<?php foreach ( $divisions as $division ):?>
				<option <?php echo $model -> id_division_fk == $division -> iddivision || ( isset ( $_GET['id_division'] ) && $_GET['id_division'] == $division -> iddivision )? 'selected' : ''?> value="<?php echo $division -> iddivision ?>"><?php echo $division -> nombre ?></option>
			<?php endforeach?>
		</select>
		<div class="help-block"></div>
	</div>

	<div class="form-group field-categoria-id_categoria_fk">
		<label class="control-label" for="categoria-id_categoria_fk"><?php echo Yii::t ('app', 'category_label')?></label>
		<select name="VolumenPrueba[id_categoria_fk]" class="form-control">
			<option value=""><?php echo Yii::t ('app', 'select')?></option>
			<?php foreach ( $categories as $category ):?>
				<option <?php echo $model -> id_categoria_fk  ==  $category -> idcategoria ? 'selected' : ''?> value="<?php echo $category -> idcategoria ?>"><?php echo $category -> nombre ?> - <?php echo $category -> divisionFk -> nombre ?></option>
			<?php endforeach?>
		</select>
		<div class="help-block"></div>
	</div>

    <div class="form-group text-right">
        <?= Html::submitButton(Yii::t('app', 'Cancel'), ['class' => 'btn btn-default']) ?>        
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
