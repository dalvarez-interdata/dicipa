<?php

namespace app\models;

class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{    
    public $id = true;
    public $username = true;
    public $password = true;
    public $authKey = true;

    public $enableSession = true;


    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        $user = Usuario::findOne([
            'idusuario' => $id,
        ]);

        if ( $user )
            return $user ;

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken ( $token, $type = null)
    {
        $user = Usuario::findOne([
            'accessToken' => $token,
        ]);

        if ( $user )
            return $user;

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        $user = Usuario::findOne([
            'username' => $username,
        ]);

        if ( $user )
            return $user;

        return null;
    }

    public function getUser () {
        
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this -> id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this -> authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this -> authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return sha1 ( $password ) === $this->password;
    }
}
