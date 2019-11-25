<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "caracteristica".
 *
 * @property int $idcaracteristica
 * @property string $nombre
 * @property string $descripcion
 *
 * @property ProductoCaracteristica[] $productoCaracteristicas
 */
class Caracteristica extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'caracteristica';
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
            'idcaracteristica' => 'Idcaracteristica',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function extraFields()
    {
        return ['productoCaracteristicas'];
    }     

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductoCaracteristicas()
    {
        return $this->hasMany(ProductoCaracteristica::className(), ['id_caracteristica_fk' => 'idcaracteristica']);
    }

    /**
     * {@inheritdoc}
     * @return CaracteristicaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CaracteristicaQuery(get_called_class());
    }
}
