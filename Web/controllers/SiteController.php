<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\helpers\Url;
use yii\web\Cookie;

class SiteController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout='//main';

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
                
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout','lockApp', 'index'],
                'rules' => [
                    [
                        'actions' => ['index', 'logout','lockApp','changeLang', 'searchType'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    //'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Change language
     *
     * @return string
     */
    public function actionChangeLang ( $lang )
    {
        $available_languages = ['en-US', 'es-ES'];

        if ( isset ( $lang ) && in_array ( $lang, $available_languages) ) 
        {
            
            Yii::$app->language = $lang;
            
            $languageCookie = new Cookie([
                'name' => '_lang',
                'value' => $lang,
                'expire' => time() + 60 * 60 * 24 * 30, // 30 days
            ]);
            Yii::$app->response->cookies->add($languageCookie);

            $this -> redirect ( Url::previous() );
        }
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
             $this -> redirect  ( Url::to (['site/index']) );
        }

        $this -> layout = 'sign-in';

        $model = new LoginForm();
        
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * lock app action.
     *
     * @return Response
     */
    public function actionLockApp()
    {
        $this -> layout = 'sign-in';

        $user = Yii::$app->user->identity -> findByUsername ( Yii::$app->user->identity->username );

        if ( isset ( $_POST ['Usuario'] ) )  {
            if ( sha1 ( $_POST ['Usuario']['password'] ) == $user -> password ) {
                $this -> redirect ( Url::to (['/home'])  );
                exit;
            } else {
                $user -> addError ( 'password', Yii::t ('error', 'INCORRECT_PASSWORD') );
            }
        }

        $user -> password = "";

        $datos = [ 'model' => $user ];

        return $this->render( 'lock_app', $datos );

    }

  


}
