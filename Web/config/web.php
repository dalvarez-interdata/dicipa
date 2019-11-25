<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [

    'id' => 'basic',    
    'defaultRoute' => 'site/login',    
    'language' => 'en-US',    
    'sourceLanguage' => 'en',
    'name' => 'Dicipa Administration',

    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'on beforeRequest' => function ( $event ) {

        if ( Yii::$app -> getRequest () -> getCookies () -> has ('_lang') ) {
            Yii::$app->language = Yii::$app -> getRequest () -> getCookies () -> getValue ('_lang');
        }

    },    
    'components' => [

        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'js'=>[]
                ],
            ],
        ],       

        'view' => [
            'theme' => [
                'class' => 'yii\base\Theme',
                'basePath' => '@web/themes/material',
                'baseUrl' => '@web/themes/material',
                'pathMap' => ['@app/views' => '@app/themes/material'],
            ],
        ],    

        'request' => [
            'cookieValidationKey' => 'rAItUEvjD73_EBwzMlSSkmuNJ-rTLBzQ',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
            'baseUrl' => '',   
            'cookieValidationKey' => 'yYy4YYYX8lYyYyQOl8vOcO6ROo7i8twO',        
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'jwt' => [
          'class' => 'sizeg\jwt\Jwt',
          'key'   => 'secret',
        ],        
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                
                'class' => 'app\components\LanguageUrlRule',
                //web routes
                'sign-in'               => 'site/login',
                'logout'                => 'site/logout',
                'lock-app'              => 'site/lock-app',
                'profile'               => 'backend-usuario/profile',
                'change-lang/<lang>'    => 'site/change-lang',
                'search/<type>'         => 'backend-producto/search-type',

                //api rest routes
                ['class' => 'yii\rest\UrlRule', 'controller' => 'producto'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'marca'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'prueba'],                
                ['class' => 'yii\rest\UrlRule', 'controller' => 'periodo'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'volumenPrueba'],                
                ['class' => 'yii\rest\UrlRule', 'controller' => 'tipoProducto'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'division'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'categoria'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'caracteristica'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'usuario'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'tipoUsuario'],                
                ['class' => 'yii\rest\UrlRule', 'controller' => 'persona'],

            ],
        ],    
        
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
