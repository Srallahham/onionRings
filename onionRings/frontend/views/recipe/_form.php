<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Album;

/* @var $this yii\web\View */
/* @var $model common\models\Recipe */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recipe-form">

    <div class="form-group">
        <?= Html::a('Create New Album', ['../album/create'], ['class' => 'btn btn-link']) ?>
    </div>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'recipe_title')->textInput(['maxlength' => true]) ?>

    <?php if ($model->isNewRecord): ?>
        <?= $form->field($model, 'file')->fileInput() ?>
    <?php endif; ?>
    <?= $form->field($model, 'recipe_preparation')->textarea(['rows' => 6]) ?>


    <?= $form->field($model, 'recipe_category')->DropDownList(
        ArrayHelper::map(\common\models\Category::find()->all(), 'category_id', 'category_name'),
        ['prompt' => 'Select Category']
    ) ?>

    <?= $form->field($model, 'recipe_album')->DropDownList(
        ArrayHelper::map(Album::find()->all(), 'album_id', 'album_name'),
        ['prompt' => 'Select Album']
    ) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
