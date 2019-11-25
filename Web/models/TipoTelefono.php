<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_telefono".
 *
 * @property int $idtipo_telefono
 * @property string $nombre
 *
 * @property Telefono[] $telefonos
 */
class TipoTelefono extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipo_telefono';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idtipo_telefono' => 'Idtipo Telefono',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function extraFields()
    {
        return ['telefonos'];
    }      

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTelefonos()
    {
        return $this->hasMany(Telefono::className(), ['tipo_telefono_fk' => 'idtipo_telefono']);
    }

    /**
     * {@inheritdoc}
     * @return TipoTelefonoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TipoTelefonoQuery(get_called_class());
    }
}
