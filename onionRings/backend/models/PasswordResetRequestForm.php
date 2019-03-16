<?php

namespace backend\models;

use Yii;
use yii\base\Model;

/**
 * {@inheritdoc}
 */
class PasswordResetRequestForm extends \common\models\PasswordResetRequestForm
{
    /**
     * {@inheritdoc}
     */
    protected static function getUserClass()
    {
        return Admin::class;
    }
}
