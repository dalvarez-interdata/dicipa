<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Producto */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
.select-item.active .custom-radio .custom-control-input:checked~.custom-control-label::before {background-color: #7460ee;border: 1px solid #ddd;}
.chosen-single span {text-transform:uppercase}
.add-item, .remove-item {width:20px;height:20px}
.add-item i, .remove-item i {position:relative;top:-2px;right:4px}  
.chosen-single span {text-align:left!important;}  
.chosen-results li {text-align:left!important;}
.select2.select2-container {width:100%!important}
.select2-container--default .select2-selection--single {
    border-color: #ced4da!important;
    height: 38px;
}
.select2-container--default .select2-selection--single .select2-selection__rendered {padding-top:4px!important;padding-bottom:4px!important}
.select2-container--default .select2-selection--single .select2-selection__arrow {top:6px!important;width:40px!important}
</style>

<div class="producto-form">

    <?php /*<div class="row m-b-20">
        <div class="col-12">
            <h4 class="card-title"><?php echo Yii::t ('app', 'product_gallery')?></h4>
            <h6 class="card-subtitle"><?php echo Yii::t ('app', 'product_galler_info')?></h6>
            <form action="#" class="dropzone">
                <?= Html::csrfMetaTags () ?>
                <div class="fallback">
                    <input name="file" type="file" multiple />
                </div>
            </form>          
        </div>
    </div> */?>

    <?php $form = ActiveForm::begin([
        'options' => [
            'enctype' => 'multipart/form-data'
        ]
    ]); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_tipo_producto_fk')->dropDownList ( $typeOfProducts ) ?>

    <?= $form->field($model, 'id_marca_fk')->dropDownList ( $brands ) ?>

    <?= $form->field($model, 'modelo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>

    <? //= $form->field($model, 'id_volumen_prueba_fk')->dropDownList ( $volumenPrueba ) ?>

    <div class="row">
        <div class="col-md-6">
            <div id="chosen-product-categories" class="m-b-10 m-t-10 p-relative">
                <label class="help-block block label-division"><?php echo Yii::t ('app', 'categories')?></label>
                <div><span class="help-block"><?php echo Yii::t ('app', 'categories_help')?></span></div>
                <div class="form-group-container m-t-10">    
                    <?php $categories = $model -> productoCategorias ?>
                    <?php if ( !$categories ):?>
                        <div class="row m-t-10">
                            <div class="col-md-9 col-sm-9 col-xs-10">
                                <select name="categories[]" data-api="search/categories" class="remote-select" data-placeholder="<?php echo Yii::t ('app', 'categories')?>"></select>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-2">
                                <div class="actions m-t-10">
                                    <button type="button"  class="btn btn-primary add-item btn-xs btn-circle m-r-5 show-tooltip" title="<?php echo Yii::t ('app', 'btn_add')?>"><i class="ti-plus"></i> </button>
                                    <button type="button" class="btn btn-secondary remove-item btn-xs btn-circle show-tooltip" title="<?php echo Yii::t ('app', 'btn_delete')?>"><i class="ti-minus"></i> </button>                                         
                                </div>
                            </div>
                        </div>                                            
                    <?php else:?>
                        <?php foreach ( $categories as $category ):?>
                            <div class="row m-t-10">
                                <div class="col-md-9 col-sm-9 col-xs-10">
                                    <select name="categories[]" data-api="search/categories" class="remote-select" data-placeholder="<?php echo Yii::t ('app', 'categories')?>">
                                        <option value="<?php echo $category -> categoria_id_fk ?>"><?php echo $category -> categoriaIdFk -> nombre ?></option>
                                    </select>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-2">
                                    <div class="actions m-t-10">
                                        <button type="button"  class="btn btn-primary add-item btn-xs btn-circle m-r-5 show-tooltip" title="<?php echo Yii::t ('app', 'btn_add')?>"><i class="ti-plus"></i> </button>
                                        <button type="button" class="btn btn-secondary remove-item btn-xs btn-circle show-tooltip" title="<?php echo Yii::t ('app', 'btn_delete')?>"><i class="ti-minus"></i> </button>                                         
                                    </div>
                                </div>
                            </div>                                                  
                        <?php endforeach?>
                    <?php endif?>

                </div>
            </div>                                
        </div>  

        <div class="col-md-6">
            <div id="chosen-product-features" class="m-b-10 m-t-10 p-relative">
                <label class="help-block block label-division"><?php echo Yii::t ('app', 'features')?></label>
                <div><span class="help-block"><?php echo Yii::t ('app', 'features_help')?></span></div>
                <div class="form-group-container m-t-10">    
                    <?php $features = $model -> productoCaracteristicas ?>
                    <?php if ( !$features ):?>
                        <div class="row m-t-10">
                            <div class="col-md-9 col-sm-9 col-xs-10">
                                <select name="features[]" data-api="search/features" class="remote-select" data-placeholder="<?php echo Yii::t ('app', 'features')?>"></select>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-2">
                                <div class="actions m-t-10">
                                    <button type="button"  class="btn btn-primary add-item btn-xs btn-circle m-r-5 show-tooltip" title="<?php echo Yii::t ('app', 'btn_add')?>"><i class="ti-plus"></i> </button>
                                    <button type="button" class="btn btn-secondary remove-item btn-xs btn-circle show-tooltip" title="<?php echo Yii::t ('app', 'btn_delete')?>"><i class="ti-minus"></i> </button>                                         
                                </div>
                            </div>
                        </div>                                            
                    <?php else:?>
                        <?php foreach ( $features as $feature ):?>
                            <div class="row m-t-10">
                                <div class="col-md-9 col-sm-9 col-xs-10">
                                    <select name="features[]" data-api="search/features" class="remote-select" data-placeholder="<?php echo Yii::t ('app', 'features')?>">
                                        <option value="<?php echo $feature -> id_caracteristica_fk ?>"><?php echo $feature -> caracteristicaFk -> nombre ?></option>
                                    </select>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-2">
                                    <div class="actions m-t-10">
                                        <button type="button"  class="btn btn-primary add-item btn-xs btn-circle m-r-5 show-tooltip" title="<?php echo Yii::t ('app', 'btn_add')?>"><i class="ti-plus"></i> </button>
                                        <button type="button" class="btn btn-secondary remove-item btn-xs btn-circle show-tooltip" title="<?php echo Yii::t ('app', 'btn_delete')?>"><i class="ti-minus"></i> </button>                                         
                                    </div>
                                </div>
                            </div>                                                  
                        <?php endforeach?>
                    <?php endif?>

                </div>
            </div>                                
        </div>               
    </div>

    <div class="row m-t-20">
        <div class="col-md-6">
            <div id="chosen-product-features" class="m-b-10 m-t-10 p-relative">
                <label class="help-block block label-division"><?php echo Yii::t ('app', 'tests')?></label>
                <div><span class="help-block"><?php echo Yii::t ('app', 'tests_help')?></span></div>
                <div class="form-group-container m-t-10">    
                    <?php $productoPruebas = $model -> productoPruebas ?>
                    <?php if ( !$productoPruebas ):?>
                        <div class="row m-t-10">
                            <div class="col-md-9 col-sm-9 col-xs-10">
                                <select name="tests[]" data-api="search/tests" class="remote-select" data-placeholder="<?php echo Yii::t ('app', 'tests')?>"></select>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-2">
                                <div class="actions m-t-10">
                                    <button type="button"  class="btn btn-primary add-item btn-xs btn-circle m-r-5 show-tooltip" title="<?php echo Yii::t ('app', 'btn_add')?>"><i class="ti-plus"></i> </button>
                                    <button type="button" class="btn btn-secondary remove-item btn-xs btn-circle show-tooltip" title="<?php echo Yii::t ('app', 'btn_delete')?>"><i class="ti-minus"></i> </button>                                         
                                </div>
                            </div>
                        </div>                                            
                    <?php else:?>
                        <?php foreach ( $productoPruebas as $productoPrueba ):?>
                            <div class="row m-t-10">
                                <div class="col-md-9 col-sm-9 col-xs-10">
                                    <select name="tests[]" data-api="search/tests" class="remote-select" data-placeholder="<?php echo Yii::t ('app', 'tests')?>">
                                        <option value="<?php echo $productoPrueba -> prueba_id_fk ?>"><?php echo $productoPrueba -> pruebaIdFk -> nombre ?></option>
                                    </select>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-2">
                                    <div class="actions m-t-10">
                                        <button type="button"  class="btn btn-primary add-item btn-xs btn-circle m-r-5 show-tooltip" title="<?php echo Yii::t ('app', 'btn_add')?>"><i class="ti-plus"></i> </button>
                                        <button type="button" class="btn btn-secondary remove-item btn-xs btn-circle show-tooltip" title="<?php echo Yii::t ('app', 'btn_delete')?>"><i class="ti-minus"></i> </button>                                         
                                    </div>
                                </div>
                            </div>                                                  
                        <?php endforeach?>
                    <?php endif?>

                </div>
            </div>                                
        </div>          
    </div>

    <div class="row m-t-20">
        <div class="col-md-12"> 
            <label class="help-block block label-division"><?php echo Yii::t ('app', 'product_gallery')?></label>
            <div><span class="help-block"><?php echo Yii::t ('app', 'product_gallery_info')?></span></div>
            <div class="form-group">
                <?php for ($i = 1; $i <= 8; $i++ ):?>
                <div class="row m-t-20">
                    <div class="col-md-1"><?php echo Yii::t ('app', 'photo')?> <?php echo $i ?></div>
                    <div class="col-md-5">
                        <input type="file" name="files[]">
                    </div>
                    <div class="col-md-3">
                        <div class="actions">
                            <button type="button"  class="btn btn-primary add-item btn-xs btn-circle m-r-5 show-tooltip" title="<?php echo Yii::t ('app', 'btn_add')?>"><i class="ti-plus"></i> </button>
                            <button type="button" class="btn btn-secondary remove-item btn-xs btn-circle show-tooltip" title="<?php echo Yii::t ('app', 'btn_delete')?>"><i class="ti-minus"></i> </button>                                         
                        </div>                        
                    </div>
                </div>
            <?php endfor ?>                                                                            
            </div>
        </div>
    </div>

    <div class="form-group text-right m-t-40">
        <?= Html::submitButton(Yii::t('app', 'Cancel'), ['class' => 'btn btn-default']) ?>        
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
jQuery (document).ready (function () {    
    /*active remote select*/
    remote_select2 ( jQuery ('.remote-select') );
    
    /*add an item*/
    jQuery ('body').on ('click', '.add-item', function () {
        var parent = jQuery (this).closest('div.row');
        var _clone = parent.clone();
        _clone.find ('.select2').remove ();
        _clone.find ('select').removeClass('select2-hidden-accessible').removeAttr('data-select2-id').removeAttr('aria-hidden');
        _clone.find ('select option').remove ();
        remote_select2 ( _clone.find ('.remote-select') );
        var container = parent.closest('div.form-group-container');
        container.append(_clone);
    });

    /*removes an item*/
    jQuery ('body').on ('click', '.remove-item', function () {
        var parent = jQuery (this).closest('div.row');
        if ( jQuery (this).closest('.form-group-container').find ('div.row').length > 1  )
            parent.remove ();
    });

    /*single select2*/
    if( jQuery ('.single-select')[0]) {
       jQuery (".single-select").select2({
            language: {
                noResults: function (params) {
                  return "No se encontraron resultados.";
                }
            } ,             
       });
    }  
    /*adds a new item key action select2
    jQuery ('body').on('keyup', '.select2-search__field', function (e) {
        if (e.which === 13) {
            var value = jQuery (this).val ();
            addItemToSelect ( jQuery ('.select2-container--open').prev ('select'), value )
        }
    });   */           
});
   
</script>