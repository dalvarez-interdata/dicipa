<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProductoPrueba;

/**
 * ProductoPruebaSearch represents the model behind the search form of `app\models\ProductoPrueba`.
 */
class ProductoPruebaSearch extends ProductoPrueba
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idProductoPrueba', 'producto_id_fk', 'prueba_id_fk'], 'integer'],
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
        $query = ProductoPrueba::find();

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
            'idProductoPrueba' => $this->idProductoPrueba,
            'producto_id_fk' => $this->producto_id_fk,
            'prueba_id_fk' => $this->prueba_id_fk,
        ]);

        return $dataProvider;
    }
}
