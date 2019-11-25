<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "producto_categoria".
 *
 * @property int $idProductoCategoria
 * @property int $producto_id_fk
 * @property int $categoria_id_fk
 *
 * @property Producto $productoIdFk
 * @property Categoria $categoriaIdFk
 */
class ProductoCategoria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'producto_categoria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['producto_id_fk', 'categoria_id_fk'], 'integer'],
            [['producto_id_fk'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::className(), 'targetAttribute' => ['producto_id_fk' => 'idproducto']],
            [['categoria_id_fk'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['categoria_id_fk' => 'idcategoria']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idProductoCategoria' => 'Id Producto Categoria',
            'producto_id_fk' => 'Producto Id Fk',
            'categoria_id_fk' => 'Categoria Id Fk',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function extraFields()
    {
        return ['productoIdFk', 'categoriaIdFk'];
    }      

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductoIdFk()
    {
        return $this->hasOne(Producto::className(), ['idproducto' => 'producto_id_fk']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoriaIdFk()
    {
        return $this->hasOne(Categoria::className(), ['idcategoria' => 'categoria_id_fk']);
    }

    /**
     * {@inheritdoc}
     * @return ProductoCategoriaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductoCategoriaQuery(get_called_class());
    }
}
