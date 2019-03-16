<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[RecipeIngredient]].
 *
 * @see RecipeIngredient
 */
class RecipeIngredientQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return RecipeIngredient[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return RecipeIngredient|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
