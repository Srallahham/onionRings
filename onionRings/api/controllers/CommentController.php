<?php

namespace api\controllers;

use yii\rest\ActiveController;

class CommentController extends ActiveController
{
    public $modelClass = 'common\models\Comment';
}
