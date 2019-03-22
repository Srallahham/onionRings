<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use common\models\Comment;
use common\models\RecipeIngredient;

/* @var $this yii\web\View */
/* @var $model common\models\Recipe */

$this->title = $model->recipe_title;
$this->params['breadcrumbs'][] = ['label' => 'Recipes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$comment = new Comment();
$comments = $model->getRecipeComments($model->recipe_id);
$ingredients = $model->getIngredients($model->recipe_id);

?>
<div class="recipe-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <h3><?= 'Category: ' . $model->getCategoryName($model->recipe_category); ?>,
        <?= 'By: ' . $model->getOwnerName($model->recipe_owner); ?></h3>

        <?php if(!yii::$app->user->isGuest &&
          $model->recipe_owner == yii::$app->user->identity->getId()) { ?>
            <p>
                <?= Html::a('Update', ['update', 'id' => $model->recipe_id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->recipe_id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
          </p>
        <?php } ?>
        <div class="row">
            <div class="thumbnail">
              <img src="<?=Yii::getAlias('@web') . '/' . 'uploads/' . $model->recipe_picture ?>"
                class="figure-img img-fluid img-rounded" width="100%"/>
              <div class="caption"> <?= $model->recipe_date ?> </div>
            </div>

            <div class="row">
              <?php
                $album = $model->getAlbum($model->recipe_album);
                foreach($album as $picture) {
              ?>
              <div class="col-md-2">
                  <div class="thumbnail">
                      <a href="<?= Yii::getAlias('@web') . '/' . $picture->picture_path ?>">
                          <img src="<?= Yii::getAlias('@web') . '/' . $picture->picture_path ?>"
                               class="figure-img img-fluid img-rounded"/>
                      </a>
                  </div>
              </div>
              <?php } ?>
            </div>
            <div class="row panel panel-body rounded">
              <?php foreach($ingredients as $ingredient) { ?>
                <div class="col-md-4">
                  <div>
                    <?= RecipeIngredient::getIngredientName($ingredient->ingredient_id) ?>
                  </div>
                </div>
              <?php } ?>
            </div>
        <div class="row panel panel-body rounded">
          <div class="col-md-4">
            <div>
                <?= $model->recipe_preparation ?>
            </div>
          </div>
        </div>

        <?php
        // get the comments
        foreach ($comments as $comment) { ?>
          <div class="row">
            <div class="col-md-1">
              <div class="panel panel-body rounded" width="100%">
                <?=$model->getOwnerName($comment->comment_owner); ?>
              </div>
            </div>
            <div class="col-md-6">
              <div class="panel panel-body rounded" width="100%">
                <?= $comment->comment ?>
              </div>
            </div>
          </div>

        <?php } ?>
</div>


<?php $script = <<< JS

jQuery(document).ready(function($) {
  $(".comment-form").on('submit', function(event) {
    event.preventDefault(); //Stopping Submitting
    //event.stopPropagation();
    //event.stopImmediatePropagation();
    var data = $(this).serializeArray();
    var url = $(this).attr('action');
    $.ajax({
      url: url,
      type: 'post',
      dataType: 'json',
      data: data
    })
    .done(function(response) {
      if(response == 0) {
        console.log("Wow You Commented!");
      } else {
        console.log("You did not comment!");
      }
    })
    .fail(function() {
      console.log("error");
    });
  });
  return false;
});

JS;
$this->registerJs($script);
?>
