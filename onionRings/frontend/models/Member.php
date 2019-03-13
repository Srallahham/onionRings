<?php
namespace frontend\models;

use Yii;

/**
 * {@inheritdoc}
 */
class Admin extends \common\models\User
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%memeber}}';
    }
}
