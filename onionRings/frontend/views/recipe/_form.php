<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Recipe */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recipe-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'recipe_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'recipe_date')->textInput() ?>

    <?= $form->field($model, 'recipe_owner')->textInput() ?>

    <?= $form->field($model, 'recipe_preparation')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'recipe_category')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
