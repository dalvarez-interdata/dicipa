<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Email]].
 *
 * @see Email
 */
class EmailQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Email[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Email|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
