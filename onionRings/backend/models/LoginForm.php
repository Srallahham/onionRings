<?php
namespace backend\models;

use Yii;
use yii\base\Model;

/**
 * {@inheritdoc}
 */
class LoginForm extends \common\models\LoginForm
{
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = Admin::findByUsername($this->username);
        }

        return $this->_user;
    }
}
