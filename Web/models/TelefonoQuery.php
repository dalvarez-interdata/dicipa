<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Telefono]].
 *
 * @see Telefono
 */
class TelefonoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Telefono[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Telefono|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
