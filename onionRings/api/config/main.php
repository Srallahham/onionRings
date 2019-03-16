<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'api\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
        ],
        'user' => [
            'identityClass' => 'frontend\models\Member'
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                ['class' => 'yii\rest\UrlRule', 'controller' => 'admin'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'album'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'category'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'comment'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'ingredient'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'layouts'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'member'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'picture'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'recipe'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'site'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'unit'],
            ],
        ],
    ],
    'params' => $params,
];
