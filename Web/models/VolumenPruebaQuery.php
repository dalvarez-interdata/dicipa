<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[VolumenPrueba]].
 *
 * @see VolumenPrueba
 */
class VolumenPruebaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return VolumenPrueba[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return VolumenPrueba|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
