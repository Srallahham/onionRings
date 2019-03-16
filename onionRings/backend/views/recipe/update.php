<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Recipe */

$this->title = 'Update Recipe: ' . $model->recipe_id;
$this->params['breadcrumbs'][] = ['label' => 'Recipes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->recipe_id, 'url' => ['view', 'id' => $model->recipe_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="recipe-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
