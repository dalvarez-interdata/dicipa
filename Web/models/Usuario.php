<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;
use yii\db\ActiveRecord;
use yii\helpers\Url;


/**
 * This is the model class for table "usuario".
 *
 * @property int $idusuario
 * @property string $username
 * @property string $email
 * @property string $password
 * @property int $id_persona_fk
 * @property int $id_tipo_usuario_fk
 * @property string $authKey
 * @property string $accessToken
 * @property int $is_active
 * @property string $last_login_time
 * @property string $imagen 
 * @property string $imagenFile 

 *
 * @property Calendario[] $calendarios
 * @property Notificacion[] $notificacions
 * @property Persona $personaFk
 * @property TipoUsuario $tipoUsuarioFk
 */
class Usuario extends ActiveRecord implements IdentityInterface
{
    // Use the trait in your User model
    use UserTrait;

    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';    
    const SCENARIO_DEFAULT = 'default'; 

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_persona_fk', 'id_tipo_usuario_fk', 'is_active'], 'integer'],
            [['username', 'email', 'password'], 'required', 'on' => self::SCENARIO_CREATE, 'message' => Yii::t ('app', 'required_field_error')],
            [['username', 'email'], 'required', 'on' => self::SCENARIO_UPDATE, 'message' => Yii::t ('app', 'required_field_error')],
            [['username', 'password'], 'required', 'on' => self::SCENARIO_DEFAULT, 'message' => Yii::t ('app', 'required_field_error')],

            [['last_login_time'], 'safe'],
            [['username', 'email'], 'string', 'max' => 50],
            [['imagenFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
            [['password', 'authKey', 'accessToken', 'imagen'], 'string', 'max' => 255],
            [['id_persona_fk'], 'exist', 'skipOnError' => true, 'targetClass' => Persona::className(), 'targetAttribute' => ['id_persona_fk' => 'idpersona']],
            [['id_tipo_usuario_fk'], 'exist', 'skipOnError' => true, 'targetClass' => TipoUsuario::className(), 'targetAttribute' => ['id_tipo_usuario_fk' => 'idTipoUsuario']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
       
        return [
            self::SCENARIO_CREATE => ['username', 'email', 'password'],
            self::SCENARIO_UPDATE => ['username', 'email'],
            self::SCENARIO_DEFAULT => ['username', 'email'],
        ];

    }    

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idusuario' => 'Idusuario',
            'username' =>  Yii::t ('app','field_username'),
            'email' => Yii::t ('app','field_email'),
            'password' => Yii::t ('app','field_password'),
            'id_persona_fk' => Yii::t ('app','field_persond_id'),
            'id_tipo_usuario_fk' => Yii::t ('app','field_user_type'),
            'authKey' => Yii::t ('app','field_auth_key'),
            'accessToken' => Yii::t ('app','field_access_token'),
            'last_login_time' => Yii::t ('app','user_last_login_time'),
            'is_active' => Yii::t ('app','user_is_active'),
            'imagen' => Yii::t ('app','user_photo'),
            'imagenFile' => Yii::t ('app','user_photos'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function extraFields()
    {
        return ['calendarios', 'notificacions', 'personaFk', 'tipoUsuarioFk'];
    } 

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalendarios()
    {
        return $this->hasMany(Calendario::className(), ['id_usuario_fk' => 'idusuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotificacions()
    {
        return $this->hasMany(Notificacion::className(), ['id_usuario_fk' => 'idusuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonaFk()
    {
        return $this->hasOne(Persona::className(), ['idpersona' => 'id_persona_fk']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoUsuarioFk()
    {
        return $this->hasOne(TipoUsuario::className(), ['idTipoUsuario' => 'id_tipo_usuario_fk']);
    }

    /**
     * {@inheritdoc}
     * @return UsuarioQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UsuarioQuery(get_called_class());
    }

   /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->idusuario;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
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

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        $user = Usuario::findOne([
            'idusuario' => $id,
        ]);

        if ( $user )
            return $user;

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
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

    /**
     * Finds user by email
     *
     * @param string $email
     * @return static|null
     */
    public static function findByEmail($email)
    {
        $user = Usuario::findOne([
            'email' => $email,
        ]);

        if ( $user )
            return $user;

        return null;
    } 

    /*
     * uploads the photo file
    */
    public function upload ()
    {
        if ($this->validate()) {
            $name =  md5 (microtime ( )) . '.' . $this->imagenFile->extension;            
            $this->imagenFile->saveAs('uploads/profiles/' . $name );
            return $name;
        } else {
            return false;
        }
    }  

    /*
     * Gets the user photo
     * @param string $size
     * @param string $cssClass   
    */
    public function getPhoto ($size = "", $cssClass="", $params = array (), $default = false) 
    {        
        $content = "";
        if ( $this -> imagen != "" && is_file ( 'uploads/profiles/' . $this ->  imagen ) )
            return '<img src="'.Url::base().'/uploads/profiles/'.$this ->  imagen.'" class="img-responsive '.$size." ".$cssClass.'" title="'.$this -> username.'"  alt="'.$this -> username.'">';            

        return '<img src="'.Url::base().'/images/no-user-image.jpg" class="img-responsive '.$size." ".$cssClass.'" title="'.$this -> username.'"  alt="'.$this -> username.'">';
    }

                
}
