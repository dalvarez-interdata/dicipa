<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pregunta".
 *
 * @property int $id
 * @property string $enunciado
 * @property string $descripcion
 * @property string $fecha_creada
 * @property int $idcotizacion_fk
 *
 * @property Cotizacion $cotizacionFk
 * @property Respuesta[] $respuestas
 */
class Pregunta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pregunta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['enunciado', 'descripcion'], 'string'],
            [['fecha_creada'], 'safe'],
            [['idcotizacion_fk'], 'integer'],
            [['idcotizacion_fk'], 'exist', 'skipOnError' => true, 'targetClass' => Cotizacion::className(), 'targetAttribute' => ['idcotizacion_fk' => 'idcotizacion']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'enunciado' => 'Enunciado',
            'descripcion' => 'Descripcion',
            'fecha_creada' => 'Fecha Creada',
            'idcotizacion_fk' => 'Idcotizacion Fk',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function extraFields()
    {
        return ['cotizacionFk', 'respuestas'];
    }     

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCotizacionFk()
    {
        return $this->hasOne(Cotizacion::className(), ['idcotizacion' => 'idcotizacion_fk']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRespuestas()
    {
        return $this->hasMany(Respuesta::className(), ['idpregunta_fk' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return PreguntaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PreguntaQuery(get_called_class());
    }
}
