<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "picture".
 *
 * @property int $picture_id
 * @property string $picture_title
 * @property string $picture_path
 * @property int $picture_album
 *
 * @property Album $pictureAlbum
 */
class Picture extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

     public $files = array();

    public static function tableName()
    {
        return 'picture';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['files'], 'file', 'maxFiles' => 10],
            [['picture_path', 'picture_album'], 'required'],
            [['picture_album'], 'integer'],
            [['picture_title', 'picture_path'], 'string', 'max' => 45],
            [['picture_album'], 'exist', 'skipOnError' => true, 'targetClass' => Album::className(), 'targetAttribute' => ['picture_album' => 'album_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'picture_id' => 'Picture ID',
            'picture_title' => 'Picture Title',
            'picture_path' => 'Picture Path',
            'picture_album' => 'Picture Album',
            'files' => 'Image'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPictureAlbum()
    {
        return $this->hasOne(Album::className(), ['album_id' => 'picture_album']);
    }

    public function getAlbum($id)
    {
      $data = Album::find()
      ->where('album_id = :id', [':id' => $id])
      ->one();
      return $data->album_name;
    }

    /**
     * {@inheritdoc}
     * @return PictureQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PictureQuery(get_called_class());
    }
}
