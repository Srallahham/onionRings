<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Picture]].
 *
 * @see Picture
 */
class PictureQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Picture[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Picture|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
