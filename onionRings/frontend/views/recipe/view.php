<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use common\models\Comment;
use common\models\RecipeIngredient;
use common\models\Like;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model common\models\Recipe */

$this->title = $model->recipe_title;
$this->params['breadcrumbs'][] = ['label' => 'Recipes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$comment = new Comment();
$likeModel = new Like();
$comments = $model->getRecipeComments($model->recipe_id);
$ingredients = $model->getIngredients($model->recipe_id);
$likes = $model->getRecipeLikes($model->recipe_id);
?>
<div class="recipe-view">

    <?php if(!yii::$app->user->isGuest &&
      $model->recipe_owner == yii::$app->user->identity->getId()) { ?>
          <?= Html::a('Update', ['update', 'id' => $model->recipe_id], ['class' => 'btn btn-link']) ?>
          <?= Html::a('Delete', ['delete', 'id' => $model->recipe_id], [
            'class' => 'btn btn-link',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
            ]) ?>
    <?php } ?>

    <div class="row">
        <div class="thumbnail">
            <img src="<?=Yii::getAlias('@web') . '/' . 'uploads/' . $model->recipe_picture ?>"
                class="figure-img img-fluid img-rounded" width="100%"/>
            <div class="caption">
                <?= $model->recipe_date ?>
                <?= $model->getCategoryName($model->recipe_category); ?>,
                <?= 'By: ' . $model->getOwnerName($model->recipe_owner); ?>
                <div class="btn btn-link">
                    <?php Pjax::begin(['id' => 'likes']); ?>
                        <?= $likes ?> likes
                    <?php Pjax::end(); ?>
                </div>
            </div>
        </div>
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

    <div class="row">
        <div class="col-md-3">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
    </div>

    <?php foreach($ingredients as $ingredient) { ?>
        <div class="row panel panel-body rounded">
            <div class="glyphicon glyphicon-plus col-md-1"></div>
            <div class="col-md-1">
                <?= $ingredient->ingredient_name ?>
            </div>
            <div class="col-md-1">
                <?= $ingredient->ingredient_quantity . ' ' .
                $ingredient->ingredient_unit ?>
            </div>
            <div class="col-md-3">
                <?= $ingredient->ingredient_desc ?>
            </div>
        </div>
    <?php } ?>
    <div class="row panel panel-body rounded">
        <div class="col-md-4">
            <div>
                <?= $model->recipe_preparation ?>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Like Section :) -->

        <?php $form = ActiveForm::begin([
            'id' => $likeModel->formName(),
            'action' => 'like?id=' . $model->recipe_id,
        ]); ?>
        <?= $form->field($likeModel, 'like_recipe')->hiddenInput(['value'=>$model->recipe_id])->label(false); ?>
        <?= $form->field($likeModel, 'like_owner')->hiddenInput(['value'=>yii::$app->user->identity->getId()])->label(false); ?>
        <div class="col-md-1">
            <?= Html::submitButton('Like', ['class' => 'btn btn-success']) ?>
        </div>
        <?php ActiveForm::end(); ?>

        <div class="col-md-1">
        <!-- Comment Section :) -->
            <?= Html::button('Comment', ['value' => Url::to('comment?id=') . $model->recipe_id,
                'class' => 'btn btn success', 'id' => 'modalButton']) ?>
        </div>

        <div class="col-md-1">
        <!-- Rate Section :) -->
            <div class="btn btn success">
                <span class="glyphicon glyphicon-star checked"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
            </div>
        </div>

    </div>
    <?php
        Pjax::begin(['id' => 'comments']);
        // get the comments
        foreach ($comments as $comment) {
    ?>
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

    <?php Pjax::end(); ?>



    <?php
        Modal::begin([
            'header' => '<h4>Comment</h4>',
            'id' => 'modal',
            'size' => 'model-lg',
        ]);

        echo '<div id="modalContent"></div>';

        Modal::end();
    ?>
</div>

<?php

$script = <<< JS

$('form#{$likeModel->formName()}').on('beforeSubmit', function(e)
{

   var \$form = $(this);
   $.post(
      \$form.attr("action"),
      \$form.serialize()
   )
   .done(function(result){
      $(document).find('#modal').modal('hide');
      console.log(result);
      if(result == 1) {
          console.log("Like");
      }
      else {
          console.log("Dislike");
      }
      $.pjax.reload({container:'#likes'});
   }).fail(function()
   {
      console.log("Server error :(");
   });
   return false;
});

JS;
$this->registerJs($script);
?>

<?php $style= <<< CSS

.checked{
    color: orange;
}

CSS;
$this->registerCss($style);
?>
