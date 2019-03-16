<?php

namespace backend\models;

use yii\base\Model;
use common\models\User;

/**
 * {@inheritdoc}
 */
class SignupForm  extends \common\models\SignupForm
{
    /**
     * {@inheritdoc}
     */
    protected static function getUserClass()
    {
        return Admin::class;
    }
}
