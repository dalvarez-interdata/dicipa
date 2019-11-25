<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "marca".
 *
 * @property int $idmarca
 * @property string $nombre
 *
 * @property Producto[] $productos
 */
class Marca extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'marca';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre',], 'required', 'message' => Yii::t ('app', 'required_field_error')],
            [['nombre'], 'string', 'max' => 50],
            [['descripcion'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idmarca' => Yii::t ('app', 'brand_id'),
            'nombre' => Yii::t ('app', 'brand_name'),
            'descripcion' => Yii::t ('app', 'brand_description'),            
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
        return $this->hasMany(Producto::className(), ['id_marca_fk' => 'idmarca']);
    }

    /**
     * {@inheritdoc}
     * @return MarcaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MarcaQuery(get_called_class());
    }
}
