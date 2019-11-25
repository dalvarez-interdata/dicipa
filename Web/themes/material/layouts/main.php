<?php
use yii\helpers\Html;
use yii\widgets\Menu;
use yii\widgets\Breadcrumbs;
use yii\debug\Toolbar;
use yii\helpers\Url;

// You can use the registerAssetBundle function if you'd like
//$this->registerAssetBundle('app');
?>
<?php //list ($lang, $local) = explode ("_", Yii::app() -> language )?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta property="og:site_name" content="<?php echo Html::encode($this->title); ?>" />
    <meta property="og:title' content="<?php echo Html::encode($this->title); ?>" />
    <meta property="og:description" content="<?php echo Html::encode($this->title); ?>" />    
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $this->theme->baseUrl ?>/assets/images/apple-touch-icon.png">
    <title><?php echo Html::encode($this->title); ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo $this->theme->baseUrl ?>/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- System CSS -->
    <link href="<?php echo $this->theme->baseUrl ?>/assets/css/style.css" rel="stylesheet">
    <!-- System CSS -->
    <link href="<?php echo $this->theme->baseUrl ?>/assets/css/custom.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?php echo $this->theme->baseUrl ?>/assets/css/colors/blue.css" id="theme" rel="stylesheet">
    <link href="<?php echo $this->theme->baseUrl ?>/assets/plugins/select2/dist/css/select2.min.css" id="theme" rel="stylesheet">
    <link href="<?php echo $this->theme->baseUrl ?>/assets/plugins/dropzone-master/dist/dropzone.css" rel="stylesheet" type="text/css" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <script src="<?php echo $this->theme->baseUrl ?>/assets/plugins/jquery/jquery.min.js"></script>
</head>

<body class="fix-header fix-sidebar card-no-border">
    <?php $this->beginBody(); ?>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo Url::base()?>"><!-- Logo text --><span> <?php echo Html::encode(\Yii::$app->name); ?></span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>                        
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <?php if ( !Yii::$app->user->isGuest ):?>
                        <?php $logged = Yii::$app->user->identity -> findByUsername ( Yii::$app->user->identity->username )  ?>
                        <?php /*<!-- ============================================================== -->
                        <!-- Notifications -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-message"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox scale-up">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Luanch Admin</h5> <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span> </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="btn btn-success btn-circle"><i class="ti-calendar"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Event today</h5> <span class="mail-desc">Just a reminder that you have event</span> <span class="time">9:10 AM</span> </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="btn btn-info btn-circle"><i class="ti-settings"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Settings</h5> <span class="mail-desc">You can customize this template as you want</span> <span class="time">9:08 AM</span> </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="btn btn-primary btn-circle"><i class="ti-user"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End notifications -->
                        <!-- ============================================================== --> */?>
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                       
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $logged -> getPhoto ('medium', 'profile-pic')?></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img">
                                                <?php echo $logged -> getPhoto ('medium', 'user-profile')?>
                                            </div>
                                            <div class="u-text">
                                                <h4><?php echo $logged -> personaFk -> nombre ?></h4>
                                                <p class="text-muted user-email"><?php echo $logged -> email  ?></p>
                                                <a href="<?php echo Url::to (['/profile/'])?>" class="btn btn-rounded btn-danger btn-sm"><?php echo Yii::t ('app', 'btn_view_profile')?></a></div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="<?php echo Url::to (['/logout/'])?>"><i class="fa fa-power-off"></i> <?php echo Yii::t ('app', 'link_logout')?></a></li>
                                </ul>
                            </div>
                        </li>
                        <?php endif?>
                        <!-- ============================================================== -->
                        <!-- Language -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                            <?php if ( Yii::$app->language == 'en-US'):?>
                                <?php $lang = 'English'?>
                                <?php $short_lang = 'en-US'?>
                                 <i class="flag-icon flag-icon-us"></i>
                            <?php else:?>
                                <?php $lang = 'Español'?>
                                <?php $short_lang = 'en-ES'?> 
                                 <i class="flag-icon flag-icon-es"></i>                          
                            <?php endif ?>                                                               
                            </a>
                            <div class="dropdown-menu dropdown-menu-right scale-up"> 
                                <a class="dropdown-item <?php echo $short_lang == 'en-ES' ? 'active' : ''?>" href="<?php echo Url::to (['/change-lang/es-ES', ])?>"><i class="flag-icon flag-icon-es"></i> Español</a>
                                <a class="dropdown-item <?php echo $short_lang == 'en-US' ? 'active' : ''?>" href="<?php echo Url::to (['/change-lang/en-US', ])?>"><i class="flag-icon flag-icon-us"></i> English</a> 
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">

                <div class="user-profile">
                    <!-- User profile image -->
                    <div class="profile-img"> 
                        <?php echo $logged -> getPhoto ('medium', 'profile-pic')?> </div>
                    <!-- User profile text-->
                    <div class="profile-text"> 
                        <a href="#" role="button" aria-haspopup="true" aria-expanded="true">
                            <?php echo $logged -> personaFk -> nombre ?> <?php echo $logged -> personaFk -> paterno ?> <br>  
                            <?php echo $logged -> email ?>
                        </a>
                    </div>
                </div>                
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <?php $uri = $_SERVER['REQUEST_URI'] ?>
                        <li><a class="waves-effect waves-dark" href="<?php echo Url::to (['/site/index'])?>" aria-expanded="false"><i class="mdi mdi-home"></i><span class="hide-menu"><?php echo Yii::t ('app', 'menu_home')?> </span></a></li>                        
                        <li <?php echo strstr ( $uri, 'backend-division' ) ||  strstr ( $uri, 'backend-categoria' ) ? 'class="active"' : ''?>><a class="waves-effect waves-dark" href="<?php echo Url::to (['/backend-division/'])?>" aria-expanded="false"><i class="mdi mdi-call-split"></i><span class="hide-menu"><?php echo Yii::t ('app', 'menu_divisions')?> </span></a></li>     
                        <li <?php echo strstr ( $uri, 'backend-producto' ) ||  strstr ( $uri, 'backend-caracteristica' ) ||  strstr ( $uri, 'backend-tipo-producto' ) ||  strstr ( $uri, 'backend-marca' ) ? 'class="active"' : ''?>><a class="waves-effect waves-dark" href="<?php echo Url::to (['/backend-producto/'])?>" aria-expanded="false"><i class="mdi mdi-memory"></i><span class="hide-menu"><?php echo Yii::t ('app', 'menu_product')?> </span></a></li>
                        <li <?php echo strstr ( $uri, 'backend-volumen-prueba' ) ||  strstr ( $uri, 'backend-periodo' ) ? 'class="active"' : ''?>><a class="waves-effect waves-dark" href="<?php echo Url::to (['/backend-volumen-prueba/'])?>" aria-expanded="false"><i class="mdi mdi-panorama-vertical"></i><span class="hide-menu"><?php echo Yii::t ('app', 'menu_volumen_test')?> </span></a></li>                        
                        <li <?php echo strstr ( $uri, 'backend-cliente' )  ? 'class="active"' : ''?>><a class="waves-effect waves-dark" href="<?php echo Url::to (['/backend-cliente/'])?>" aria-expanded="false"><i class="mdi mdi-clipboard-account"></i><span class="hide-menu"><?php echo Yii::t ('app', 'menu_customer')?> </span></a></li>
                        <li <?php echo strstr ( $uri, 'backend-cotizacion' )  ? 'class="active"' : ''?>><a class="waves-effect waves-dark" href="<?php echo Url::to (['/backend-cotizacion/'])?>" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu"><?php echo Yii::t ('app', 'menu_cotizations')?> </span></a></li>                        
                        <li <?php echo strstr ( $uri, 'backend-prueba' )  ? 'class="active"' : ''?>><a class="waves-effect waves-dark" href="<?php echo Url::to (['/backend-prueba/'])?>" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu"><?php echo Yii::t ('app', 'menu_test')?> </span></a></li>
                        <?php /*<li><a class="waves-effect waves-dark" href="<?php echo Url::to (['/backend-periodo/'])?>" aria-expanded="false"><i class="mdi mdi-calendar"></i><span class="hide-menu"><?php echo Yii::t ('app', 'menu_periods')?> </span></a></li>*/?>
                        <li <?php echo strstr ( $uri, 'backend-usuario' )  ? 'class="active"' : ''?>><a class="waves-effect waves-dark" href="<?php echo Url::to (['/backend-usuario/'])?>" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu"><?php echo Yii::t ('app', 'menu_users')?> </span></a></li></li>
                        <li <?php echo strstr ( $uri, 'backend-configurations' )  ? 'class="active"' : ''?>><a class="waves-effect waves-dark" href="<?php echo Url::to (['/backend-configurations/'])?>" aria-expanded="false"><i class="mdi mdi-settings"></i><span class="hide-menu"><?php echo Yii::t ('app', 'menu_settings')?> </span></a></li></li>
                        <?php /*<li><a class="waves-effect waves-dark" href="<?php echo Url::to (['/backend-tipo-telefono/'])?>" aria-expanded="false"><i class="mdi mdi-phone"></i><span class="hide-menu"><?php echo Yii::t ('app', 'menu_type_phone')?> </span></a></li>
                        <li><a class="waves-effect waves-dark" href="<?php echo Url::to (['/backend-tipo-domicilio/'])?>" aria-expanded="false"><i class="mdi mdi-home-variant"></i><span class="hide-menu"><?php echo Yii::t ('app', 'menu_type_home')?> </span></a></li>*/?>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <!-- Bottom points-->
            <div class="sidebar-footer">
                <!-- item--><a href="<?php echo Url::to (['/profile/'])?>" class="link" data-toggle="tooltip" title="<?php echo Yii::t ('app', 'link_my_profile')?>"><i class="ti-user"></i></a>
                <!-- item--><a href="<?php echo Url::to (['/lock-app/'])?>" class="link" data-toggle="tooltip" title="<?php echo Yii::t ('app', 'link_lock_screen')?>"><i class="mdi mdi-lock"></i></a> 
                <!-- item--><a href="<?php echo Url::to (['/logout/'])?>" class="link" data-toggle="tooltip" title="<?php echo Yii::t ('app', 'link_logout')?>"><i class="mdi mdi-power"></i></a> 
            </div>
            <!-- End Bottom points-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <?php echo $content; ?>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer">
               <?php echo Html::encode(\Yii::$app->name); ?>
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script type="text/javascript">var baseUrl = '<?php echo Url::base()?>';</script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo $this->theme->baseUrl ?>/assets/plugins/popper/popper.min.js"></script>
    <script src="<?php echo $this->theme->baseUrl ?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo $this->theme->baseUrl ?>/assets/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo $this->theme->baseUrl ?>/assets/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo $this->theme->baseUrl ?>/assets/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo $this->theme->baseUrl ?>/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="<?php echo $this->theme->baseUrl ?>/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    
    <script src="<?php echo $this->theme->baseUrl ?>/assets/plugins/select2/dist/js/select2.min.js"></script>
    <script src="<?php echo $this->theme->baseUrl ?>/assets/plugins/dropzone-master/dist/dropzone.js"></script>

    <!--Custom JavaScript -->
    <script src="<?php echo $this->theme->baseUrl ?>/assets/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?php echo $this->theme->baseUrl ?>/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <?php 
        if (class_exists('yii\debug\Module')) {
            $this->off(\yii\web\View::EVENT_END_BODY, [\yii\debug\Module::getInstance(), 'renderToolbar']);
        }    
    ?>
    <?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>