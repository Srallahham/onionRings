<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Content Creators';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="users-content-creators">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Create Content Creators', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' =>$searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'user_id',
            'user_name',
            'user_email:email',
            'user_password',
            'permission_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
