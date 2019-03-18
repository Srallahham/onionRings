<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Album;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Picture */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="picture-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'picture_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file')->fileInput(); ?>

    <?= $form->field($model, 'picture_album')->DropDownList(
          ArrayHelper::map(Album::find()->all(), 'album_id', 'album_name'),
          ['prompt' => 'Select Album']
      ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
