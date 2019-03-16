<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Album */

$this->title = 'Update Album: ' . $model->album_id;
$this->params['breadcrumbs'][] = ['label' => 'Albums', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->album_id, 'url' => ['view', 'id' => $model->album_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="album-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
