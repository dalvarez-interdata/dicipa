<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Calendario]].
 *
 * @see Calendario
 */
class CalendarioQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Calendario[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Calendario|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
