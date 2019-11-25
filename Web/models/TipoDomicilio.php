<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_domicilio".
 *
 * @property int $idtipodomicilio
 * @property string $nombre
 *
 * @property Domicilio[] $domicilios
 */
class TipoDomicilio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipo_domicilio';
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
            'idtipodomicilio' => 'Idtipodomicilio',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function extraFields()
    {
        return ['domicilios'];
    }        

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDomicilios()
    {
        return $this->hasMany(Domicilio::className(), ['id_tipodomicilio_fk' => 'idtipodomicilio']);
    }

    /**
     * {@inheritdoc}
     * @return TipoDomicilioQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TipoDomicilioQuery(get_called_class());
    }
}
