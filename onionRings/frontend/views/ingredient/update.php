<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Ingredient */

$this->title = 'Update Ingredient: ' . $model->ingredient_id;
$this->params['breadcrumbs'][] = ['label' => 'Ingredients', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ingredient_id, 'url' => ['view', 'id' => $model->ingredient_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ingredient-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
