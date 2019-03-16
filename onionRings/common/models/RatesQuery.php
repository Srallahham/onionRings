<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Rates]].
 *
 * @see Rates
 */
class RatesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Rates[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Rates|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
