<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "like".
 *
 * @property int $like_id
 * @property int $like_owner
 * @property int $like_recipe
 *
 * @property Recipe $likeRecipe
 * @property Member $likeOwner
 */
class Like extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'like';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['like_owner', 'like_recipe'], 'required'],
            [['like_owner', 'like_recipe'], 'integer'],
            [['like_recipe'], 'exist', 'skipOnError' => true, 'targetClass' => Recipe::className(), 'targetAttribute' => ['like_recipe' => 'recipe_id']],
            [['like_owner'], 'exist', 'skipOnError' => true, 'targetClass' => Member::className(), 'targetAttribute' => ['like_owner' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'like_id' => 'Like ID',
            'like_owner' => 'Like Owner',
            'like_recipe' => 'Like Recipe',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLikeRecipe()
    {
        return $this->hasOne(Recipe::className(), ['recipe_id' => 'like_recipe']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLikeOwner()
    {
        return $this->hasOne(Member::className(), ['id' => 'like_owner']);
    }

    /**
     * {@inheritdoc}
     * @return likeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new likeQuery(get_called_class());
    }
}