<?php

namespace app\models;

use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "division".
 *
 * @property int $iddivision
 * @property string $nombre
 * @property string $descripcion
 *
 * @property Categoria[] $categorias
 */
class Division extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'division';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion'], 'string'],
            [['nombre'], 'string', 'max' => 50],
            [['imagen'], 'string', 'max' => 255],
            [['imagenFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],            
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'iddivision' => 'Iddivision',
            'nombre' => 'Name',
            'descripcion' => 'Description',
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function extraFields()
    {
        return ['categorias'];
    }        

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategorias()
    {
        return  Categoria::findAll([
            'id_division_fk' => $this -> iddivision,
        ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public static function findAllDivisions ()
    {
        return Division::find()->all();
    }


    /**
     * {@inheritdoc}
     * @return DivisionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DivisionQuery(get_called_class());
    }

    /*
     * uploads the photo file
    */
    public function upload ()
    {
        if ($this->validate() && $this->imagenFile ) {
            $name =  md5 (microtime ( )) . '.' . $this->imagenFile->extension;            
            $this->imagenFile->saveAs('uploads/divisions/' . $name );
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
        if ( $this -> imagen != "" && is_file ( 'uploads/divisions/' . $this ->  imagen ) )
            return '<img src="'.Url::base().'/uploads/divisions/'.$this ->  imagen.'" class="img-responsive '.$size." ".$cssClass.'" title="'.$this -> nombre.'"  alt="'.$this -> nombre.'">';            

        return '<img src="'.Url::base().'/images/logo_avatar.png" class="img-responsive '.$size." ".$cssClass.'" title="'.$this -> nombre.'"  alt="'.$this -> nombre.'">';
    }

}
