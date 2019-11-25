<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ProductoImagen]].
 *
 * @see ProductoImagen
 */
class ProductoImagenQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ProductoImagen[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ProductoImagen|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
