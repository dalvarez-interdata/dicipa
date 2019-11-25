<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Caracteristica]].
 *
 * @see Caracteristica
 */
class CaracteristicaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Caracteristica[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Caracteristica|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
