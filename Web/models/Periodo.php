<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "periodo".
 *
 * @property int $idperiodo
 * @property string $nombre
 *
 * @property VolumenPrueba[] $volumenPruebas
 */
class Periodo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'periodo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required', 'message' => Yii::t ('app', 'required_field_error')],
            [['nombre'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idperiodo' => Yii::t ('app', 'period_id'),
            'nombre'    => Yii::t ('app', 'period_name'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function extraFields()
    {
        return ['volumenPruebas'];
    }    

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVolumenPruebas()
    {
        return $this->hasMany(VolumenPrueba::className(), ['id_periodo_fk' => 'idperiodo']);
    }

    /**
     * {@inheritdoc}
     * @return PeriodoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PeriodoQuery(get_called_class());
    }
}
