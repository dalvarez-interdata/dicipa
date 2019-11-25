<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ProductoPrueba]].
 *
 * @see ProductoPrueba
 */
class ProductoPruebaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ProductoPrueba[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ProductoPrueba|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
