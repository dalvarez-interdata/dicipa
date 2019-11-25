<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProductoCaracteristica;

/**
 * ProductoCaracteristicaSearch represents the model behind the search form of `app\models\ProductoCaracteristica`.
 */
class ProductoCaracteristicaSearch extends ProductoCaracteristica
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idProductoCaracteristica', 'id_producto_fk', 'id_caracteristica_fk'], 'integer'],
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
        $query = ProductoCaracteristica::find();

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
            'idProductoCaracteristica' => $this->idProductoCaracteristica,
            'id_producto_fk' => $this->id_producto_fk,
            'id_caracteristica_fk' => $this->id_caracteristica_fk,
        ]);

        return $dataProvider;
    }
}
