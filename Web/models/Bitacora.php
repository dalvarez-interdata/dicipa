<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bitacora".
 *
 * @property int $id
 * @property string $tabla
 * @property string $record
 * @property string $cambio
 * @property string $fecha
 * @property int $usuario
 */
class Bitacora extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bitacora';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tabla', 'record', 'usuario'], 'required'],
            [['cambio'], 'string'],
            [['fecha'], 'safe'],
            [['usuario'], 'integer'],
            [['tabla', 'record'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tabla' => 'Tabla',
            'record' => 'Record',
            'cambio' => 'Cambio',
            'fecha' => 'Fecha',
            'usuario' => 'Usuario',
        ];
    }

    /**
     * {@inheritdoc}
     * @return BitacoraQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BitacoraQuery(get_called_class());
    }
}
