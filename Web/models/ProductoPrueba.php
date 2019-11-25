<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "producto_prueba".
 *
 * @property int $idProductoPrueba
 * @property int $producto_id_fk
 * @property int $prueba_id_fk
 *
 * @property Producto $productoIdFk
 * @property Prueba $pruebaIdFk
 */
class ProductoPrueba extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'producto_prueba';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['producto_id_fk', 'prueba_id_fk'], 'integer'],
            [['producto_id_fk'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::className(), 'targetAttribute' => ['producto_id_fk' => 'idproducto']],
            [['prueba_id_fk'], 'exist', 'skipOnError' => true, 'targetClass' => Prueba::className(), 'targetAttribute' => ['prueba_id_fk' => 'idprueba']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idProductoPrueba' => 'Id Producto Prueba',
            'producto_id_fk' => 'Producto Id Fk',
            'prueba_id_fk' => 'Prueba Id Fk',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function extraFields()
    {
        return ['productoIdFk', 'pruebaIdFk'];
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
    public function getPruebaIdFk()
    {
        return $this->hasOne(Prueba::className(), ['idprueba' => 'prueba_id_fk']);
    }

    /**
     * {@inheritdoc}
     * @return ProductoPruebaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductoPruebaQuery(get_called_class());
    }
}
