<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_usuario".
 *
 * @property int $idTipoUsuario
 * @property string $tipo
 *
 * @property Usuario[] $usuarios
 */
class TipoUsuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipo_usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idTipoUsuario' => 'Id Tipo Usuario',
            'tipo' => 'Tipo',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function extraFields()
    {
        return ['usuarios'];
    } 
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuario::className(), ['id_tipo_usuario_fk' => 'idTipoUsuario']);
    }

    /**
     * {@inheritdoc}
     * @return TipoUsuarioQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TipoUsuarioQuery(get_called_class());
    }
}
