<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "recipe_ingredient".
 *
 * @property int $recipe_ingredient_id
 * @property int $recipe_id
 * @property string $ingredient_name
 * @property string $ingredient_unit
 * @property int $ingredient_quantity
 * @property string $ingredient_desc
 *
 * @property Recipe $recipe
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
            [['ingredient_name', 'ingredient_unit'], 'required'],
            [['recipe_id', 'ingredient_quantity'], 'integer'],
            [['ingredient_name', 'ingredient_desc'], 'string', 'max' => 15],
            [['ingredient_unit'], 'string', 'max' => 11],
            [['recipe_id'], 'exist', 'skipOnError' => true, 'targetClass' => Recipe::className(), 'targetAttribute' => ['recipe_id' => 'recipe_id']],
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
            'ingredient_name' => 'Ingredient Name',
            'ingredient_unit' => 'Unit',
            'ingredient_quantity' => 'Quantity',
            'ingredient_desc' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecipe()
    {
        return $this->hasOne(Recipe::className(), ['recipe_id' => 'recipe_id']);
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
