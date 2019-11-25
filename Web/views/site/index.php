<?php
/* @var $this yii\web\View */
$this->title = 'Dashboard';
?>
<div class="row page-titles">
    <div class="col-md-12 col-12 align-self-center">
        <h3 class="text-themecolor"><?php echo Yii::t ('app', 'welcome')?> </h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><?php echo Yii::t ('app', 'menu_home')?></li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php echo Yii::t ('app', 'welcome_text')?>
            </div>
        </div>
    </div>
</div>