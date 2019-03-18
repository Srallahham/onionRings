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

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'recipe_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <?= $form->field($model, 'recipe_preparation')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'recipe_category')->textInput() ?>

    <?= $form->field($model, 'recipe_album')->DropDownList(
          ArrayHelper::map(Album::find()->all(), 'album_id', 'album_name'),
          ['prompt' => 'Select Album']
      ) ?>

      <div class="form-group">
          <?= Html::a('Create New Album', ['../album/create'], ['class' => 'btn btn-primary']) ?>
      </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
