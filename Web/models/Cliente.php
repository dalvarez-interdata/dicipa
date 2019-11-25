<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property int $idcliente
 * @property string $email
 * @property int $id_persona_fk
 *
 * @property Persona $personaFk
 * @property Cotizacion[] $cotizacions
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_persona_fk'], 'integer'],
            [['email'], 'string', 'max' => 50],
            [['email', 'id_persona_fk'], 'required', 'message' => Yii::t ('app', 'required_field_error')],
            [['id_persona_fk'], 'exist', 'skipOnError' => true, 'targetClass' => Persona::className(), 'targetAttribute' => ['id_persona_fk' => 'idpersona']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idcliente' => Yii::t ('app', 'customer_id'),
            'email' => Yii::t ('app', 'customer_email'),
            'id_persona_fk' => Yii::t ('app', 'customer_id_person'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function extraFields()
    {
        return ['personaFk', 'cotizacions'];
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
    public function getCotizacions()
    {
        return $this->hasMany(Cotizacion::className(), ['id_cliente_fk' => 'idcliente']);
    }

    /**
     * {@inheritdoc}
     * @return ClienteQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ClienteQuery(get_called_class());
    }
}
