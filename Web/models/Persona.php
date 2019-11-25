<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "persona".
 *
 * @property int $idpersona
 * @property string $nombre
 * @property string $paterno
 * @property string $materno
 *
 * @property Cliente[] $clientes
 * @property Domicilio[] $domicilios
 * @property Email[] $emails
 * @property Telefono[] $telefonos
 * @property Usuario[] $usuarios
 */
class Persona extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'persona';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'paterno'], 'string', 'max' => 50],
            [['materno'], 'string', 'max' => 255],
            [['nombre', 'paterno', 'materno'], 'required', 'message' => Yii::t ('app', 'required_field_error')],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idpersona' => 'Idpersona',
            'nombre'  => Yii::t ('app','field_person_name'),
            'paterno' => Yii::t ('app','field_person_lastname_father'),
            'materno' => Yii::t ('app','field_person_lastname_mother'),
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function extraFields()
    {
        return ['clientes','domicilios','emails','telefonos','usuarios'];
    }       

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientes()
    {
        return $this->hasMany(Cliente::className(), ['id_persona_fk' => 'idpersona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDomicilios()
    {
        return $this->hasMany(Domicilio::className(), ['id_persona_fk' => 'idpersona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmails()
    {
        return $this->hasMany(Email::className(), ['id_persona_fk' => 'idpersona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTelefonos()
    {
        return $this->hasMany(Telefono::className(), ['id_persona_fk' => 'idpersona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuario::className(), ['id_persona_fk' => 'idpersona']);
    }

    /**
     * {@inheritdoc}
     * @return PersonaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PersonaQuery(get_called_class());
    }
}
