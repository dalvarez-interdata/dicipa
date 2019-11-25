<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\VolumenPrueba;

/**
 * VolumenPruebaSearch represents the model behind the search form of `app\models\VolumenPrueba`.
 */
class VolumenPruebaSearch extends VolumenPrueba
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idVolumenPrueba', 'cantidad_min', 'cantidad_max', 'id_periodo_fk'], 'integer'],
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
        $query = VolumenPrueba::find();

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
            'idVolumenPrueba' => $this->idVolumenPrueba,
            'cantidad_min' => $this->cantidad_min,
            'cantidad_max' => $this->cantidad_max,
            'id_periodo_fk' => $this->id_periodo_fk,
        ]);

        return $dataProvider;
    }
}
