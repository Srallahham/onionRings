<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "recipe_ingredient".
 *
 * @property int $recipe_ingredient_id
 * @property int $recipe_id
 * @property int $ingredient_id
 * @property int $ingredient_quantity
 * @property int $ingredient_unit
 * @property string $ingredient_desc
 *
 * @property Ingredient $ingredient
 * @property Recipe $recipe
 * @property Unit $ingredientUnit
 */
class RecipeIngredient extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recipe_ingredient';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['recipe_id', 'ingredient_id', 'ingredient_unit'], 'required'],
            [['recipe_id', 'ingredient_id', 'ingredient_quantity', 'ingredient_unit'], 'integer'],
            [['ingredient_desc'], 'string', 'max' => 15],
            [['ingredient_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ingredient::className(), 'targetAttribute' => ['ingredient_id' => 'ingredient_id']],
            [['recipe_id'], 'exist', 'skipOnError' => true, 'targetClass' => Recipe::className(), 'targetAttribute' => ['recipe_id' => 'recipe_id']],
            [['ingredient_unit'], 'exist', 'skipOnError' => true, 'targetClass' => Unit::className(), 'targetAttribute' => ['ingredient_unit' => 'unit_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'recipe_ingredient_id' => 'Recipe Ingredient ID',
            'recipe_id' => 'Recipe ID',
            'ingredient_id' => 'Ingredient ID',
            'ingredient_quantity' => 'Ingredient Quantity',
            'ingredient_unit' => 'Ingredient Unit',
            'ingredient_desc' => 'Ingredient Desc',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngredient()
    {
        return $this->hasOne(Ingredient::className(), ['ingredient_id' => 'ingredient_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecipe()
    {
        return $this->hasOne(Recipe::className(), ['recipe_id' => 'recipe_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngredientUnit()
    {
        return $this->hasOne(Unit::className(), ['unit_id' => 'ingredient_unit']);
    }

    /**
     * {@inheritdoc}
     * @return RecipeIngredientQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RecipeIngredientQuery(get_called_class());
    }
}
