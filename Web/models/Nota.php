<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nota".
 *
 * @property int $idnotas
 * @property string $nombre
 * @property string $contenido
 * @property string $fecha
 * @property string $hora
 * @property int $usuario_fk
 * @property int $cotizacion_fk
 *
 * @property Usuario $usuarioFk
 * @property Cotizacion $cotizacionFk
 */
class Nota extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nota';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['contenido'], 'string'],
            [['fecha', 'hora'], 'safe'],
            [['usuario_fk', 'cotizacion_fk'], 'integer'],
            [['nombre'], 'string', 'max' => 50],
            [['usuario_fk'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['usuario_fk' => 'idusuario']],
            [['cotizacion_fk'], 'exist', 'skipOnError' => true, 'targetClass' => Cotizacion::className(), 'targetAttribute' => ['cotizacion_fk' => 'idcotizacion']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idnotas' => 'Idnotas',
            'nombre' => 'Nombre',
            'contenido' => 'Contenido',
            'fecha' => 'Fecha',
            'hora' => 'Hora',
            'usuario_fk' => 'Usuario Fk',
            'cotizacion_fk' => 'Cotizacion Fk',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function extraFields()
    {
        return ['usuarioFk', 'cotizacionFk'];
    }      

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioFk()
    {
        return $this->hasOne(Usuario::className(), ['idusuario' => 'usuario_fk']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCotizacionFk()
    {
        return $this->hasOne(Cotizacion::className(), ['idcotizacion' => 'cotizacion_fk']);
    }

    /**
     * {@inheritdoc}
     * @return NotaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NotaQuery(get_called_class());
    }
}
