<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "recipe".
 *
 * @property int $recipe_id
 * @property string $recipe_title
 * @property int $recipe_picture
 * @property string $recipe_date
 * @property int $recipe_owner
 * @property string $recipe_preparation
 * @property int $recipe_category
 *
 * @property Album[] $albums
 * @property Comment[] $comments
 * @property Like[] $likes
 * @property Rates[] $rates
 * @property Category $recipeCategory
 * @property Member $recipeOwner
 * @property Picture $recipePicture
 * @property RecipeIngredient[] $recipeIngredients
 */
class Recipe extends \yii\db\ActiveRecord
{

    public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recipe';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['file'], 'file'],
            [['recipe_title', 'recipe_date', 'recipe_owner', 'recipe_category'], 'required'],
            [['recipe_picture', 'recipe_owner', 'recipe_category'], 'integer'],
            [['recipe_date'], 'safe'],
            [['recipe_preparation'], 'string'],
            [['recipe_title'], 'string', 'max' => 45],
            [['recipe_title'], 'unique'],
            [['recipe_category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['recipe_category' => 'category_id']],
            [['recipe_owner'], 'exist', 'skipOnError' => true, 'targetClass' => Member::className(), 'targetAttribute' => ['recipe_owner' => 'id']],
            [['recipe_picture'], 'exist', 'skipOnError' => true, 'targetClass' => Picture::className(), 'targetAttribute' => ['recipe_picture' => 'picture_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'recipe_id' => 'Recipe ID',
            'recipe_title' => 'Recipe Title',
            'recipe_picture' => 'Recipe Picture',
            'recipe_date' => 'Recipe Date',
            'recipe_owner' => 'Recipe Owner',
            'recipe_preparation' => 'Recipe Preparation',
            'recipe_category' => 'Recipe Category',
            'file' => 'Upload A Picture',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlbums()
    {
        return $this->hasMany(Album::className(), ['album_recipe' => 'recipe_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['comment_recipe' => 'recipe_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLikes()
    {
        return $this->hasMany(Like::className(), ['like_recipe' => 'recipe_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRates()
    {
        return $this->hasMany(Rates::className(), ['rate_recipe' => 'recipe_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecipeCategory()
    {
        return $this->hasOne(Category::className(), ['category_id' => 'recipe_category']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecipeOwner()
    {
        return $this->hasOne(Member::className(), ['id' => 'recipe_owner']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecipePicture()
    {
        return $this->hasOne(Picture::className(), ['picture_id' => 'recipe_picture']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecipeIngredients()
    {
        return $this->hasMany(RecipeIngredient::className(), ['recipe_id' => 'recipe_id']);
    }

    /**
     * {@inheritdoc}
     * @return RecipeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RecipeQuery(get_called_class());
    }
}
