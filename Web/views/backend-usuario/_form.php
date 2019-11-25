<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
?>
<style>.image-user-profile {cursor:pointer}.field-usuario-imagenfile .control-label {display:none}#usuario-imagenfile {margin-top:20px;}#usuario-imagenfile{opacity:0}
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
<div class="usuario-form">

    <?php $form = ActiveForm::begin([
        'options' => ['class' => "form-horizontal", 'enctype' => 'multipart/form-data'],        
    ]); ?>

    <div class="text-center">
        <span data-toggle="tooltip" data-placement="top" title="<?php echo  Yii::t ('app', 'click_to_set_image') ?>"><?php echo $model -> getPhoto ('large','m-t-20 m-b-10 image-circle image-user-profile')?></span>   
        <br>  
        <small><?php echo Yii::t ('app', 'click_to_upload_profile')?></small>  <br> 
        <?= $form->field($model, 'imagenFile')->fileInput() ?>        
    </div>

    
    <h4 class="help-block block label-division m-b-20"><?php echo Yii::t ('app', 'general_info')?></h4>

    <?= $form->field($modelPersona, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelPersona, 'paterno')->textInput(['maxlength' => true]) ?>    

    <?= $form->field($modelPersona, 'materno')->textInput(['maxlength' => true]) ?> 

    <div class="row">

        <div class="col-md-12">
            <div id="chosen-address-person" class="m-b-10 m-t-10 p-relative">
                <label class="help-block block label-division"><?php echo Yii::t ('app', 'user_addresses')?></label>
                <div><span class="help-block"><?php echo Yii::t ('app', 'user_addresses_help')?></span></div>
                <div class="form-group-container m-t-10">    
                    <?php $domicilios = $modelPersona -> domicilios ?>
                    <?php if ( !$domicilios ):?>
                        <div class="row m-t-10">
                            <div class="col-md-7 col-sm-7 col-xs-7">
                                <input type="text" name="user_address[]" class="form-control" placeholder="<?php echo Yii::t ('app', 'user_address')?>">
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <select  name="user_type_address[]" class="form-control">
                                    <?php foreach ( $typeDomicilios as $typeDomicilio ):?>
                                         <option value="<?php echo $typeDomicilio -> idtipodomicilio?>"><?php echo $typeDomicilio -> nombre?></option>
                                    <?php endforeach?>                                       
                                </select>
                            </div>  
                            <div class="col-md-2 col-sm-2 col-xs-2">
                                <div class="actions m-t-10">
                                    <button type="button"  class="btn btn-primary add-item btn-xs btn-circle m-r-5 show-tooltip" title="<?php echo Yii::t ('app', 'btn_add')?>"><i class="ti-plus"></i> </button>
                                    <button type="button" class="btn btn-secondary remove-item btn-xs btn-circle show-tooltip" title="<?php echo Yii::t ('app', 'btn_delete')?>"><i class="ti-minus"></i> </button>                                         
                                </div>
                            </div>
                        </div>                                            
                    <?php else:?>
                        <?php foreach ( $domicilios as $domicilio ):?>
                            <div class="row m-t-10">
                                <div class="col-md-6 col-sm-6 col-xs-7">
                                    <input type="text" value="<?php echo $domicilio -> direccion ?>" name="user_address[]" class="form-control" placeholder="<?php echo Yii::t ('app', 'user_address')?>">
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-4">
                                    <select  name="user_type_address[]" class="form-control">
                                        <?php foreach ( $typeDomicilios as $typeDomicilio ):?>
                                             <option <?php echo $domicilio -> id_tipodomicilio_fk == $typeDomicilio -> idtipodomicilio ? 'selected="selected"' : ''?> value="<?php echo $typeDomicilio -> idtipodomicilio?>"><?php echo $typeDomicilio -> nombre?></option>
                                        <?php endforeach?>                                       
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
  

    <h4 class="help-block block label-division m-t-40 m-b-10"><?php echo Yii::t ('app', 'contact_info')?></h4>

    <div class="row">

        <div class="col-md-6">
            <div id="chosen-phones-person" class="m-b-10 m-t-10 p-relative">
                <label class="help-block block label-division"><?php echo Yii::t ('app', 'user_phones')?></label>
                <div><span class="help-block"><?php echo Yii::t ('app', 'user_phones_help')?></span></div>
                <div class="form-group-container m-t-10">    
                    <?php $phones = $modelPersona -> telefonos ?>
                    <?php if ( !$phones ):?>
                        <div class="row m-t-10">
                            <div class="col-md-6 col-sm-6 col-xs-7">
                                <input type="text" name="user_phones[]" class="form-control" placeholder="<?php echo Yii::t ('app', 'user_phone')?>">
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-4">
                                <select  name="user_type_phones[]" class="form-control">
                                    <?php foreach ( $typePhones as $typePhone ):?>
                                         <option value="<?php echo $typePhone -> idtipo_telefono?>"><?php echo $typePhone -> nombre?></option>
                                    <?php endforeach?>                                       
                                </select>
                            </div>                             
                            <div class="col-md-3 col-sm-3 col-xs-2">
                                <div class="actions m-t-10">
                                    <button type="button"  class="btn btn-primary add-item btn-xs btn-circle m-r-5 show-tooltip" title="<?php echo Yii::t ('app', 'btn_add')?>"><i class="ti-plus"></i> </button>
                                    <button type="button" class="btn btn-secondary remove-item btn-xs btn-circle show-tooltip" title="<?php echo Yii::t ('app', 'btn_delete')?>"><i class="ti-minus"></i> </button>                                         
                                </div>
                            </div>
                        </div>                                            
                    <?php else:?>
                        <?php foreach ( $phones as $phone ):?>
                            <div class="row m-t-10">
                                <div class="col-md-6 col-sm-6 col-xs-7">
                                    <input type="text" name="user_phones[]" placeholder="<?php echo Yii::t ('app', 'user_phone')?>" class="form-control" value="<?php echo $phone -> numero ?>">
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-4">
                                    <select  name="user_type_phones[]" class="form-control">
                                        <?php foreach ( $typePhones as $typePhone ):?>
                                             <option <?php echo $phone -> id_tipo_telefono_fk == $typePhone -> idtipo_telefono ? 'selected="selected"' : ''?> value="<?php echo $typePhone -> idtipo_telefono?>"><?php echo $typePhone -> nombre?></option>
                                        <?php endforeach?>                                       
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
            <div id="chosen-emails-person" class="m-b-10 m-t-10 p-relative">
                <label class="help-block block label-division"><?php echo Yii::t ('app', 'user_emails')?></label>
                <div><span class="help-block"><?php echo Yii::t ('app', 'user_emails_help')?></span></div>
                <div class="form-group-container m-t-10">    
                    <?php $emails = $modelPersona -> emails ?>
                    <?php if ( !$emails ):?>
                        <div class="row m-t-10">
                            <div class="col-md-9 col-sm-9 col-xs-10">
                                <input type="text" name="user_emails[]" placeholder="<?php echo Yii::t ('app', 'user_email')?>" class="form-control">
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-2">
                                <div class="actions m-t-10">
                                    <button type="button"  class="btn btn-primary add-item btn-xs btn-circle m-r-5 show-tooltip" title="<?php echo Yii::t ('app', 'btn_add')?>"><i class="ti-plus"></i> </button>
                                    <button type="button" class="btn btn-secondary remove-item btn-xs btn-circle show-tooltip" title="<?php echo Yii::t ('app', 'btn_delete')?>"><i class="ti-minus"></i> </button>                                         
                                </div>
                            </div>
                        </div>                                            
                    <?php else:?>
                        <?php foreach ( $emails as $email ):?>
                            <div class="row m-t-10">
                                <div class="col-md-9 col-sm-9 col-xs-10">
                                    <input type="text" name="user_emails[]" class="form-control" placeholder="<?php echo Yii::t ('app', 'user_email')?>" value="<?php echo $email -> direccion ?>">
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

    <h4 class="help-block block label-division m-t-40 m-b-20"><?php echo Yii::t ('app', 'app_access_info')?></h4>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?php $model -> password = "" ?>
    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_tipo_usuario_fk')->dropDownList ( $typeUsers ) ?>    

    <div class="form-group text-right">
        <?= Html::submitButton(Yii::t('app', 'Cancel'), ['class' => 'btn btn-default']) ?>        
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
    jQuery (document).ready (function () {
        
        jQuery ('.image-user-profile').click(function(e) {
            e.preventDefault();
            jQuery ('#usuario-imagenfile').val ('');
            jQuery ('#usuario-imagenfile').trigger('click');
        });

        jQuery ('#usuario-imagenfile').change(function(event) {
            var input = document.getElementById ('usuario-imagenfile');
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                  jQuery ('.image-user-profile')
                    .attr('src', e.target.result)
                };
                reader.readAsDataURL(input.files[0]);
              }
        });

        /*active remote select*/
        remote_select2 ( jQuery ('.remote-select') );
        
        /*add an item*/
        jQuery ('body').on ('click', '.add-item', function () {
            var parent = jQuery (this).closest('div.row');
            var _clone = parent.clone();
            //_clone.find ('.select2').remove ();
            //_clone.find ('select').removeClass('select2-hidden-accessible').removeAttr('data-select2-id').removeAttr('aria-hidden');
            //_clone.find ('select option').remove ();
            _clone.find ('input').val ('');
            //remote_select2 ( _clone.find ('.remote-select') );
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

    })
</script>
