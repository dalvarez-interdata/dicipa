<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prueba".
 *
 * @property int $idprueba
 * @property string $nombre
 * @property string $descripcion
 *
 * @property ProductoPrueba[] $productoPruebas
 */
class Prueba extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prueba';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion'], 'string'],
            [['nombre'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idprueba' => 'Idprueba',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function extraFields()
    {
        return ['productoPruebas'];
    }    

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductoPruebas()
    {
        return $this->hasMany(ProductoPrueba::className(), ['prueba_id_fk' => 'idprueba']);
    }

    /**
     * {@inheritdoc}
     * @return PruebaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PruebaQuery(get_called_class());
    }
}
