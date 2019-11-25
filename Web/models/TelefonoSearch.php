<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Telefono;

/**
 * TelefonoSearch represents the model behind the search form of `app\models\Telefono`.
 */
class TelefonoSearch extends Telefono
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idtelefono', 'id_tipo_telefono_fk', 'id_persona_fk'], 'integer'],
            [['numero'], 'safe'],
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
        $query = Telefono::find();

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
            'idtelefono' => $this->idtelefono,
            'id_tipo_telefono_fk' => $this->id_tipo_telefono_fk,
            'id_persona_fk' => $this->id_persona_fk,
        ]);

        $query->andFilterWhere(['like', 'numero', $this->numero]);

        return $dataProvider;
    }
}
