<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Domicilio]].
 *
 * @see Domicilio
 */
class DomicilioQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Domicilio[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Domicilio|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
