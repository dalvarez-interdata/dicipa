<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "domicilio".
 *
 * @property int $iddomicilio
 * @property string $direccion
 * @property int $id_tipodomicilio_fk
 * @property int $id_persona_fk
 *
 * @property TipoDomicilio $tipodomicilioFk
 * @property Persona $personaFk
 */
class Domicilio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'domicilio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_tipodomicilio_fk', 'id_persona_fk'], 'integer'],
            [['direccion'], 'string', 'max' => 255],
            [['id_tipodomicilio_fk'], 'exist', 'skipOnError' => true, 'targetClass' => TipoDomicilio::className(), 'targetAttribute' => ['id_tipodomicilio_fk' => 'idtipodomicilio']],
            [['id_persona_fk'], 'exist', 'skipOnError' => true, 'targetClass' => Persona::className(), 'targetAttribute' => ['id_persona_fk' => 'idpersona']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'iddomicilio' => Yii::t ('app', 'id_home'),
            'direccion' => Yii::t ('app', 'user_address'),
            'id_tipodomicilio_fk' => Yii::t ('app', 'type_home'),
            'id_persona_fk' => Yii::t ('app', 'person_id'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function extraFields()
    {
        return ['tipodomicilioFk', 'personaFk'];
    }   
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipodomicilioFk()
    {
        return $this->hasOne(TipoDomicilio::className(), ['idtipodomicilio' => 'id_tipodomicilio_fk']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonaFk()
    {
        return $this->hasOne(Persona::className(), ['idpersona' => 'id_persona_fk']);
    }

    /**
     * {@inheritdoc}
     * @return DomicilioQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DomicilioQuery(get_called_class());
    }
}
