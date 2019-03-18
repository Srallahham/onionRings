<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\RecipeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recipe-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'recipe_id') ?>

    <?= $form->field($model, 'recipe_title') ?>

    <?= $form->field($model, 'recipe_picture') ?>

    <?= $form->field($model, 'recipe_date') ?>

    <?= $form->field($model, 'recipe_owner') ?>

    <?php // echo $form->field($model, 'recipe_preparation') ?>

    <?php // echo $form->field($model, 'recipe_category') ?>

    <?php // echo $form->field($model, 'recipe_album') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
