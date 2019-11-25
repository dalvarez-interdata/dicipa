<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "producto_caracteristica".
 *
 * @property int $idProductoCaracteristica
 * @property int $id_producto_fk
 * @property int $id_caracteristica_fk
 *
 * @property Producto $productoFk
 * @property Caracteristica $caracteristicaFk
 */
class ProductoCaracteristica extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'producto_caracteristica';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_producto_fk', 'id_caracteristica_fk'], 'integer'],
            [['id_producto_fk'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::className(), 'targetAttribute' => ['id_producto_fk' => 'idproducto']],
            [['id_caracteristica_fk'], 'exist', 'skipOnError' => true, 'targetClass' => Caracteristica::className(), 'targetAttribute' => ['id_caracteristica_fk' => 'idcaracteristica']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idProductoCaracteristica' => 'Id Producto Caracteristica',
            'id_producto_fk' => 'Id Producto Fk',
            'id_caracteristica_fk' => 'Id Caracteristica Fk',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function extraFields()
    {
        return ['productoFk', 'caracteristicaFk'];
    }     

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductoFk()
    {
        return $this->hasOne(Producto::className(), ['idproducto' => 'id_producto_fk']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCaracteristicaFk()
    {
        return $this->hasOne(Caracteristica::className(), ['idcaracteristica' => 'id_caracteristica_fk']);
    }

    /**
     * {@inheritdoc}
     * @return ProductoCaracteristicaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductoCaracteristicaQuery(get_called_class());
    }
}
