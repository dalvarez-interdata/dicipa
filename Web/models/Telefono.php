<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "telefono".
 *
 * @property int $idtelefono
 * @property string $numero
 * @property int $id_tipo_telefono_fk
 * @property int $id_persona_fk
 *
 * @property TipoTelefono $tipoTelefonoFk
 * @property Persona $personaFk
 */
class Telefono extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'telefono';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_tipo_telefono_fk', 'id_persona_fk'], 'integer'],
            [['numero'], 'string', 'max' => 50],
            [['id_tipo_telefono_fk'], 'exist', 'skipOnError' => true, 'targetClass' => TipoTelefono::className(), 'targetAttribute' => ['id_tipo_telefono_fk' => 'idtipo_telefono']],
            [['id_persona_fk'], 'exist', 'skipOnError' => true, 'targetClass' => Persona::className(), 'targetAttribute' => ['id_persona_fk' => 'idpersona']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idtelefono' => 'Idtelefono',
            'numero' => 'Numero',
            'id_tipo_telefono_fk' => 'Id Tipo Telefono Fk',
            'id_persona_fk' => 'Id Persona Fk',
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function extraFields()
    {
        return ['personaFk','tipoTelefonoFk'];
    }        

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoTelefonoFk()
    {
        return $this->hasOne(TipoTelefono::className(), ['idtipo_telefono' => 'id_tipo_telefono_fk']);
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
     * @return TelefonoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TelefonoQuery(get_called_class());
    }
}
