<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "calendario".
 *
 * @property int $idagenda
 * @property string $titulo
 * @property string $descripcion
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property string $ubicacion
 * @property int $id_usuario_fk
 *
 * @property Usuario $usuarioFk
 */
class Calendario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'calendario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion'], 'string'],
            [['fecha_inicio', 'fecha_fin'], 'safe'],
            [['id_usuario_fk'], 'integer'],
            [['titulo', 'ubicacion'], 'string', 'max' => 255],
            [['id_usuario_fk'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['id_usuario_fk' => 'idusuario']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idagenda' => 'Idagenda',
            'titulo' => 'Titulo',
            'descripcion' => 'Descripcion',
            'fecha_inicio' => 'Fecha Inicio',
            'fecha_fin' => 'Fecha Fin',
            'ubicacion' => 'Ubicacion',
            'id_usuario_fk' => 'Id Usuario Fk',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function extraFields()
    {
        return ['usuarioFk'];
    }     

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioFk()
    {
        return $this->hasOne(Usuario::className(), ['idusuario' => 'id_usuario_fk']);
    }

    /**
     * {@inheritdoc}
     * @return CalendarioQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CalendarioQuery(get_called_class());
    }
}
