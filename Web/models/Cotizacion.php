<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cotizacion".
 *
 * @property int $idcotizacion
 * @property int $id_usuario_fk
 * @property int $id_cliente_fk
 * @property int $id_producto_fk
 *
 * @property Usuario $usuarioFk
 * @property Cliente $clienteFk
 * @property Producto $productoFk
 * @property Nota[] $notas
 */
class Cotizacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cotizacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_usuario_fk', 'id_cliente_fk', 'id_producto_fk'], 'integer'],
            [['id_usuario_fk'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['id_usuario_fk' => 'idusuario']],
            [['id_cliente_fk'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['id_cliente_fk' => 'idcliente']],
            [['id_producto_fk'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::className(), 'targetAttribute' => ['id_producto_fk' => 'idproducto']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idcotizacion' => 'Idcotizacion',
            'id_usuario_fk' => 'Id Usuario Fk',
            'id_cliente_fk' => 'Id Cliente Fk',
            'id_producto_fk' => 'Id Producto Fk',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function extraFields()
    {
        return ['usuarioFk', 'clienteFk', 'productoFk', 'notas'];
    }      

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioFk()
    {
        return $this->hasOne(Usuario::className(), ['idusuario' => 'id_usuario_fk']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClienteFk()
    {
        return $this->hasOne(Cliente::className(), ['idcliente' => 'id_cliente_fk']);
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
    public function getNotas()
    {
        return $this->hasMany(Nota::className(), ['cotizacion_fk' => 'idcotizacion']);
    }

    /**
     * {@inheritdoc}
     * @return CotizacionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CotizacionQuery(get_called_class());
    }
}
