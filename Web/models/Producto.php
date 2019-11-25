<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "producto".
 *
 * @property int $idproducto
 * @property string $nombre
 * @property string $modelo
 * @property string $descripcion
 * @property int $id_marca_fk
 * @property int $id_volumen_prueba_fk
 * @property int $id_tipo_producto_fk
 *
 * @property Marca $marcaFk
 * @property VolumenPrueba $volumenPruebaFk
 * @property TipoProducto $tipoProductoFk
 * @property ProductoCaracteristica[] $productoCaracteristicas
 * @property ProductoCategoria[] $productoCategorias
 * @property ProductoPrueba[] $productoPruebas
 */
class Producto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'producto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion'], 'string'],
            [['id_marca_fk', 'id_volumen_prueba_fk', 'id_tipo_producto_fk'], 'integer'],
            [['id_marca_fk', 'nombre', 'modelo', 'id_tipo_producto_fk', 'descripcion' ], 'required', 'message' => Yii::t ('app', 'required_field_error')],
            [['nombre', 'modelo'], 'string', 'max' => 50],
            [['id_marca_fk'], 'exist', 'skipOnError' => true, 'targetClass' => Marca::className(), 'targetAttribute' => ['id_marca_fk' => 'idmarca']],
            [['id_volumen_prueba_fk'], 'exist', 'skipOnError' => true, 'targetClass' => VolumenPrueba::className(), 'targetAttribute' => ['id_volumen_prueba_fk' => 'idVolumenPrueba']],
            [['id_tipo_producto_fk'], 'exist', 'skipOnError' => true, 'targetClass' => TipoProducto::className(), 'targetAttribute' => ['id_tipo_producto_fk' => 'idTipoProducto']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idproducto' => Yii::t ('app', 'id_product'),
            'nombre' => Yii::t ('app', 'product_name'),
            'modelo' => Yii::t ('app', 'product_model'),
            'descripcion' => Yii::t ('app', 'product_description'),
            'id_marca_fk' => Yii::t ('app', 'product_brand'),
            'id_volumen_prueba_fk' => Yii::t ('app', 'product_test_volumen'),
            'id_tipo_producto_fk' => Yii::t ('app', 'product_type'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function extraFields()
    {
        return ['marcaFk', 'volumenPruebaFk', 'tipoProductoFk', 'productoCaracteristicas', 'productoCategorias', 'productoPruebas'];
    }      

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarcaFk()
    {
        return $this->hasOne(Marca::className(), ['idmarca' => 'id_marca_fk']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVolumenPruebaFk()
    {
        return $this->hasOne(VolumenPrueba::className(), ['idVolumenPrueba' => 'id_volumen_prueba_fk']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoProductoFk()
    {
        return $this->hasOne(TipoProducto::className(), ['idTipoProducto' => 'id_tipo_producto_fk']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductoCaracteristicas()
    {
        return $this->hasMany(ProductoCaracteristica::className(), ['id_producto_fk' => 'idproducto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductoCategorias()
    {
        return $this->hasMany(ProductoCategoria::className(), ['producto_id_fk' => 'idproducto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductoPruebas()
    {
        return $this->hasMany(ProductoPrueba::className(), ['producto_id_fk' => 'idproducto']);
    }

    /**
     * {@inheritdoc}
     * @return ProductoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductoQuery(get_called_class());
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImagenes ()
    {
        return  ProductoImagen::findAll([
            'id_producto_fk' => $this -> idproducto,
        ]);
    }    


}
