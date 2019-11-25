<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_producto".
 *
 * @property int $idTipoProducto
 * @property string $nombre
 * @property string $descripcion
 *
 * @property Producto[] $productos
 */
class TipoProducto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipo_producto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre',], 'required', 'message' => Yii::t ('app', 'required_field_error')],
            [['descripcion'], 'string'],
            [['nombre'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idTipoProducto' => Yii::t ('app', 'type_of_product_id'),
            'nombre' => Yii::t ('app', 'type_of_product_name'),
            'descripcion' => Yii::t ('app', 'type_of_product_description'),
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function extraFields()
    {
        return ['productos'];
    }      

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductos()
    {
        return $this->hasMany(Producto::className(), ['id_tipo_producto_fk' => 'idTipoProducto']);
    }

    /**
     * {@inheritdoc}
     * @return TipoProductoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TipoProductoQuery(get_called_class());
    }
}
