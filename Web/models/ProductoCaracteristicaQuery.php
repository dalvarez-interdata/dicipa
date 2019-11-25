<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ProductoCaracteristica]].
 *
 * @see ProductoCaracteristica
 */
class ProductoCaracteristicaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ProductoCaracteristica[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ProductoCaracteristica|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
