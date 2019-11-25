<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Cotizacion]].
 *
 * @see Cotizacion
 */
class CotizacionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Cotizacion[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Cotizacion|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
