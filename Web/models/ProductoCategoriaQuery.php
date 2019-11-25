<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ProductoCategoria]].
 *
 * @see ProductoCategoria
 */
class ProductoCategoriaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ProductoCategoria[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ProductoCategoria|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
