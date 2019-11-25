<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cotizacion;

/**
 * CotizacionSearch represents the model behind the search form of `app\models\Cotizacion`.
 */
class CotizacionSearch extends Cotizacion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idcotizacion', 'id_usuario_fk', 'id_cliente_fk', 'id_producto_fk'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Cotizacion::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idcotizacion' => $this->idcotizacion,
            'id_usuario_fk' => $this->id_usuario_fk,
            'id_cliente_fk' => $this->id_cliente_fk,
            'id_producto_fk' => $this->id_producto_fk,
        ]);

        return $dataProvider;
    }
}
