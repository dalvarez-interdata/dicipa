<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categoria".
 *
 * @property int $idcategoria
 * @property string $nombre
 * @property string $descripcion
 * @property int $id_division_fk
 * @property int $id_categoria_fk
 *
 * @property Division $divisionFk
 * @property Categoria $categoriaFk
 * @property Categoria[] $categorias
 * @property ProductoCategoria[] $productoCategorias
 */
class Categoria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categoria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion'], 'string'],
            [['id_division_fk', 'id_categoria_fk', 'orden'], 'integer'],
            [['nombre', 'abreviatura'], 'string', 'max' => 50],
            [['id_division_fk'], 'exist', 'skipOnError' => true, 'targetClass' => Division::className(), 'targetAttribute' => ['id_division_fk' => 'iddivision']],
            [['id_categoria_fk'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['id_categoria_fk' => 'idcategoria']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idcategoria' => 'Id',
            'nombre' => 'Name',
            'abreviatura' => 'Abbreviature',
            'descripcion' => 'Description',
            'id_division_fk' => 'Division',
            'id_categoria_fk' => 'Parent',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function extraFields()
    {
        return ['divisionFk', 'categoriaFk', 'categorias', 'productoCategorias'];
    }        

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDivisionFk()
    {
        return $this->hasOne(Division::className(), ['iddivision' => 'id_division_fk']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoriaFk()
    {
        return $this->hasOne(Categoria::className(), ['idcategoria' => 'id_categoria_fk']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategorias()
    {
        return $this->hasMany(Categoria::className(), ['id_categoria_fk' => 'idcategoria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductoCategorias()
    {
        return $this->hasMany(ProductoCategoria::className(), ['categoria_id_fk' => 'idcategoria']);
    }

    /**
     * {@inheritdoc}
     * @return CategoriaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CategoriaQuery(get_called_class());
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public static function findAllCategories ()
    {
        return Categoria::find () -> all ();
    }    
}
