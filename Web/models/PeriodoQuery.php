<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Periodo]].
 *
 * @see Periodo
 */
class PeriodoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Periodo[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Periodo|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
