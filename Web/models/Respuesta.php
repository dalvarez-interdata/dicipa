<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "respuesta".
 *
 * @property int $id
 * @property int $idpregunta_fk
 * @property string $texto
 * @property string $fecha_creada
 *
 * @property Pregunta $preguntaFk
 */
class Respuesta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'respuesta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idpregunta_fk'], 'integer'],
            [['texto'], 'string'],
            [['fecha_creada'], 'string', 'max' => 255],
            [['idpregunta_fk'], 'exist', 'skipOnError' => true, 'targetClass' => Pregunta::className(), 'targetAttribute' => ['idpregunta_fk' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idpregunta_fk' => 'Idpregunta Fk',
            'texto' => 'Texto',
            'fecha_creada' => 'Fecha Creada',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function extraFields()
    {
        return ['preguntaFk'];
    }      

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPreguntaFk()
    {
        return $this->hasOne(Pregunta::className(), ['id' => 'idpregunta_fk']);
    }

    /**
     * {@inheritdoc}
     * @return RespuestaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RespuestaQuery(get_called_class());
    }
}
