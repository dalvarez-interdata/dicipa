<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Pregunta]].
 *
 * @see Pregunta
 */
class PreguntaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Pregunta[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Pregunta|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
