<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "volumen_prueba".
 *
 * @property int $idVolumenPrueba
 * @property int $cantidad_min
 * @property int $cantidad_max
 * @property int $id_periodo_fk
 *
 * @property Producto[] $productos
 * @property Periodo $periodoFk
 * @property Division $divisionFk 
 * @property Categoria $categoriaFk 
 */
class VolumenPrueba extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'volumen_prueba';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cantidad_min','cantidad_min', 'id_periodo_fk', 'id_division_fk', 'id_categoria_fk', 'nombre' ], 'required', 'message' => Yii::t ('app', 'required_field_error')],
            [['nombre'], 'string', 'max' => 255 ],
            [['cantidad_min', 'cantidad_max', 'id_periodo_fk', 'id_division_fk', 'id_categoria_fk' ], 'integer'],
            [['id_periodo_fk'], 'exist', 'skipOnError' => true, 'targetClass' => Periodo::className(), 'targetAttribute' => ['id_periodo_fk' => 'idperiodo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idVolumenPrueba' => Yii::t ('app', 'volumen_test_id'),
            'cantidad_min' => Yii::t ('app', 'volumen_test_min_count'),
            'cantidad_max' => Yii::t ('app', 'volumen_test_max_count'),
            'id_periodo_fk' => Yii::t ('app', 'volumen_test_period'),
            'id_division_fk' => Yii::t ('app', 'volumen_test_division'),
            'id_categoria_fk' => Yii::t ('app', 'volumen_test_category'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function extraFields()
    {
        return ['productos', 'periodoFk', 'divisionFk', 'categoriaFk'];
    }       

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductos()
    {
        return $this->hasMany(Producto::className(), ['id_volumen_prueba_fk' => 'idVolumenPrueba']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeriodoFk()
    {
        return $this->hasOne(Periodo::className(), ['idperiodo' => 'id_periodo_fk']);
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
     * {@inheritdoc}
     * @return VolumenPruebaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VolumenPruebaQuery(get_called_class());
    }
         
}
