<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "album".
 *
 * @property int $album_id
 * @property int $album_recipe
 * @property string $album_name
 *
 * @property Recipe $albumRecipe
 * @property Picture[] $pictures
 */
class Album extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'album';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['album_recipe'], 'integer'],
            [['album_name'], 'required'],
            [['album_name'], 'string', 'max' => 15],
            [['album_recipe'], 'exist', 'skipOnError' => true, 'targetClass' => Recipe::className(), 'targetAttribute' => ['album_recipe' => 'recipe_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'album_id' => 'Album ID',
            'album_recipe' => 'Album Recipe',
            'album_name' => 'Album Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlbumRecipe()
    {
        return $this->hasOne(Recipe::className(), ['recipe_id' => 'album_recipe']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPictures()
    {
        return $this->hasMany(Picture::className(), ['picture_album' => 'album_id']);
    }

    /**
     * {@inheritdoc}
     * @return AlbumQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AlbumQuery(get_called_class());
    }
}
