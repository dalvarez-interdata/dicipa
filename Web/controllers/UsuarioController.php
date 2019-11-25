<?php

namespace app\controllers;

use Yii;
use yii\rest\ActiveController;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\Usuario;
use app\models\User;
use sizeg\jwt\JwtHttpBearerAuth;
use sizeg\jwt\Jwt;
use yii\helpers\Url;
/**
 * UsuarioController implements the CRUD actions for Usuario model.
 */
class UsuarioController extends ActiveController
{
    public $modelClass = 'app\models\Usuario'; 

    public $pluralize = false; 

	/**
     * {@inheritdoc}
     */
    public function behaviors()
    {
                
        return [
            /*'bearerAuth' => [
                'class' => HttpBearerAuth::className()
            ],*/        	
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'do-login'  => ['post'],
                    'do-logout' => ['post'],
                    'is-logged' => ['get'],
                ],
            ],
        ];
    } 

    /**
     * DoLogin action.
     *
     * @return Response|string
     */
    public function actionDoLogin()
    {    
        
        if ( !isset ( $_POST['username'] ) || !isset ( $_POST['password'] ) ) {
            return $this->asJson ( ['error' => 'Username and password cannot be blank.' ] );
        }

        $model = new LoginForm();

        $model -> username = $_POST['username'];
        $model -> password = $_POST['password'];

        //check if user is already logged
        $user = User::findByUsername ( $model -> username ); 

        //if ( $user && $user -> is_active == 1 ) {
        //    return $this->asJson ( ['error' => 'User already logged.' ] );
        //}
        
        if ( $model->login() ) {
            
            $user = User::findByUsername ( Yii::$app->user->identity->username ); 
            $person = $user -> personaFk;

            //generar el json web token
            $tokenId    = base64_encode(mcrypt_create_iv(32));
            $issuedAt   = time();
            $notBefore  = $issuedAt;             //Adding 10 seconds
            $expire     = $notBefore + 5184000;            // Adding 60 Days
            $serverName = 'www.dicipa.com.mx';
			$token = Yii::$app->jwt->getBuilder()
			            ->setIssuer($serverName) // Configures the issuer (iss claim)
			            ->setId($tokenId, true) // Configures the id (jti claim), replicating as a header item
			            ->setIssuedAt($issuedAt) // Configures the time that the token was issue (iat claim)
			            ->setNotBefore($notBefore) // Configures the time before which the token cannot be accepted (nbf claim)
			            ->setExpiration($expire) // Configures the expiration time of the token (exp claim)
			            ->set('uid', $user -> id) // Configures a new claim, called "uid"
			            ->getToken(); // Retrieves the generated token

            $user -> is_active = 1;
            $user -> last_login_time = date ('Y-m-d H:i:s');
            $user -> save ();

            $jwt = [  
                'token' => (string) $token,
                'data' => [     // Data related to the signer user
                    'id' => $user -> idusuario,
                    'username'               => $user -> username,
                    'name'  	             => $person -> nombre,
                    'father_lastname'        => $person -> paterno,
                    'mother_lastname'        => $person -> materno,
                    'photo'                  => Yii::$app -> request -> headers -> get('host') . Url::to('@web/uploads/profiles/') . $user -> imagen,
                    'email'                  => $user -> email,
                    'type'                   => $user -> tipoUsuarioFk -> tipo,
                ]
            ];

            $response = [
                'status' => true,
                'message' => 'Login Success..',
                'jwt' => $jwt,
            ];            

            return $this->asJson ( $response );
        } 
        else {
            return $this->asJson ( ['error' => 'Incorrect username or password.' ] );
        }
    }  

    /**
     * DoLogout action.
     *
     * @return Response|string
     */
    public function actionDoLogout()
    {    
        //check json web token
        if ( !isset ( $_REQUEST ['jwt'] ) )
             throw new \yii\web\ForbiddenHttpException( sprintf ('JSON Web Token is needed.') );

        //parsing and getting the token
        $token = Yii::$app->jwt->getParser()->parse((string) $_REQUEST ['jwt'] ); // Parses from a string
        $data = Yii::$app->jwt->getValidationData(); // It will use the current time to validate (iat, nbf and exp)

        if ( !$token->validate($data) )
            throw new \yii\web\ForbiddenHttpException( sprintf ('JSON Web Token not match.') );

        if ( Yii::$app->user->isGuest ) {
           return $this->asJson ( ['error' => 'User not logged.' ] );
        }

        $user = User::findByUsername ( Yii::$app->user->identity->username ); 

        if ( $user ) {
            $user -> is_active = 0;
            $user -> save ();
        }

        Yii::$app->user->logout();
        
        return $this->asJson ( ['message' => 'Session closed.' ] );
    }

    /**
     * Is logged action.
     *
     * @return Response|string
     */
    public function actionIsLogged ()
    {    
        //check json web token
        if ( !isset ( $_REQUEST ['jwt'] ) )
             throw new \yii\web\ForbiddenHttpException( sprintf ('JSON Web Token is needed.') );

        //parsing and getting the token
        $token = Yii::$app->jwt->getParser()->parse((string) $_REQUEST ['jwt'] ); // Parses from a string
        $token->getHeaders(); // Retrieves the token header
        $token->getClaims(); // Retrieves the token claims        

        $data = Yii::$app->jwt->getValidationData(); // It will use the current time to validate (iat, nbf and exp)


        if ( !Yii::$app->user->isGuest && $token->validate($data) ) 
            return $this->asJson ( ['status' => 'logged', 'username' => Yii::$app->user->identity->username, 'jti' => $token->getHeader('jti') ] );
        
        return $this->asJson ( ['status' => 'not-logged' ] );      
    }  


}
