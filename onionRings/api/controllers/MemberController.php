<?php

namespace api\controllers;

use yii\rest\ActiveController;

class MemberController extends ActiveController
{
    public $modelClass = 'frontend\models\Member';
}
