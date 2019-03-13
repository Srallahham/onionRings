<?php
namespace frontend\models;

use Yii;

/**
 * {@inheritdoc}
 */
class Member extends \common\models\User
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%member}}';
    }
}
