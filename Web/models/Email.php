<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "email".
 *
 * @property int $idemail
 * @property string $direccion
 * @property int $id_persona_fk
 *
 * @property Persona $personaFk
 */
class Email extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'email';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_persona_fk'], 'integer'],
            [['direccion'], 'string', 'max' => 255],
            [['id_persona_fk'], 'exist', 'skipOnError' => true, 'targetClass' => Persona::className(), 'targetAttribute' => ['id_persona_fk' => 'idpersona']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idemail' => 'Idemail',
            'direccion' => 'Direccion',
            'id_persona_fk' => 'Id Persona Fk',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function extraFields()
    {
        return ['personaFk'];
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
     * @return EmailQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EmailQuery(get_called_class());
    }
}
