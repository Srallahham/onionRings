<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ingredient".
 *
 * @property int $ingredient_id
 * @property string $ingredient_name
 * @property string $ingredient_symbol
 *
 * @property RecipeIngredient[] $recipeIngredients
 */
class Ingredient extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public $recipeIngredients;
    public static function tableName()
    {
        return 'ingredient';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ingredient_name'], 'required'],
            [['ingredient_name'], 'string', 'max' => 15],
            [['ingredient_symbol'], 'string', 'max' => 45],
            [['ingredient_name'], 'unique'],
            [['ingredient_symbol'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ingredient_id' => 'Ingredient ID',
            'ingredient_name' => 'Ingredient Name',
            'ingredient_symbol' => 'Ingredient Symbol',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecipeIngredients()
    {
        return $this->hasMany(RecipeIngredient::className(), ['ingredient_id' => 'ingredient_id']);
    }

    /**
     * {@inheritdoc}
     * @return IngredientQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new IngredientQuery(get_called_class());
    }
}
