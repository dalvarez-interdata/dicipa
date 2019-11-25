<?php

namespace app\controllers;

use Yii;
use yii\rest\ActiveController;
use sizeg\jwt\JwtHttpBearerAuth;
use sizeg\jwt\Jwt;

/**
 * ClienteController implements the CRUD actions for Cliente model.
 */
class ClienteController extends ActiveController
{

    public $modelClass = 'app\models\Cliente'; 

    public $pluralize = true;
	
	/**
	 * Checks the privilege of the current user.
	 *
	 * This method should be overridden to check whether the current user has the privilege
	 * to run the specified action against the specified data model.
	 * If the user does not have access, a [[ForbiddenHttpException]] should be thrown.
	 *
	 * @param string $action the ID of the action to be executed
	 * @param \yii\base\Model $model the model to be accessed. If `null`, it means no specific model is being accessed.
	 * @param array $params additional parameters
	 * @throws ForbiddenHttpException if the user does not have access
	 */
	public function checkAccess($action, $model = null, $params = [])
	{
	    // throw ForbiddenHttpException if access should be denied
	    if ( Yii::$app->user->isGuest ) {
	    	 throw new \yii\web\ForbiddenHttpException( sprintf ('You are not allowed to performance this action.', $action));
	    } else {
	    	//check json web token
	    	if ( !isset ( $_REQUEST ['jwt'] ) )
	    		 throw new \yii\web\ForbiddenHttpException( sprintf ('JSON Web Token is needed.', $action));

	    	//parsing and getting the token
	    	$token = Yii::$app->jwt->getParser()->parse((string) $_REQUEST ['jwt'] ); // Parses from a string
	    	$data = Yii::$app->jwt->getValidationData(); // It will use the current time to validate (iat, nbf and exp)

	    	if ( !$token->validate($data) )
	    		throw new \yii\web\ForbiddenHttpException( sprintf ('JSON Web Token not match.', $action));
	    }
	}

}
