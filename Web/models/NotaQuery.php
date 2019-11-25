<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Nota]].
 *
 * @see Nota
 */
class NotaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Nota[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Nota|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
