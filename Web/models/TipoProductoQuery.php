<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TipoProducto]].
 *
 * @see TipoProducto
 */
class TipoProductoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return TipoProducto[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return TipoProducto|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
