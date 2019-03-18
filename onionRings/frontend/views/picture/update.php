<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Picture */

$this->title = 'Update Picture: ' . $model->picture_id;
$this->params['breadcrumbs'][] = ['label' => 'Pictures', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->picture_id, 'url' => ['view', 'id' => $model->picture_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="picture-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
