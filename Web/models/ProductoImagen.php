<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "producto_imagen".
 *
 * @property int $id
 * @property int $imagen
 * @property int $id_producto_fk
 * @property int $portada
 */
class ProductoImagen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'producto_imagen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['imagen', 'id_producto_fk', 'portada'], 'required'],
            [['imagen'], 'string', 'max' => 50],
            [['id_producto_fk', 'portada'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'imagen' => 'Imagen',
            'id_producto_fk' => 'Id Producto Fk',
            'portada' => 'Portada',
        ];
    }

    /**
     * {@inheritdoc}
     * @return ProductoImagenQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductoImagenQuery(get_called_class());
    }
}
