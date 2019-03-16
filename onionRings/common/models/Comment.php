<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property int $comment_id
 * @property string $comment
 * @property int $comment_owner
 * @property int $comment_recipe
 *
 * @property Recipe $commentRecipe
 * @property Member $commentOwner
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['comment', 'comment_owner', 'comment_recipe'], 'required'],
            [['comment'], 'string'],
            [['comment_owner', 'comment_recipe'], 'integer'],
            [['comment_recipe'], 'exist', 'skipOnError' => true, 'targetClass' => Recipe::className(), 'targetAttribute' => ['comment_recipe' => 'recipe_id']],
            [['comment_owner'], 'exist', 'skipOnError' => true, 'targetClass' => Member::className(), 'targetAttribute' => ['comment_owner' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'comment_id' => 'Comment ID',
            'comment' => 'Comment',
            'comment_owner' => 'Comment Owner',
            'comment_recipe' => 'Comment Recipe',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCommentRecipe()
    {
        return $this->hasOne(Recipe::className(), ['recipe_id' => 'comment_recipe']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCommentOwner()
    {
        return $this->hasOne(Member::className(), ['id' => 'comment_owner']);
    }

    /**
     * {@inheritdoc}
     * @return commentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new commentQuery(get_called_class());
    }
}
