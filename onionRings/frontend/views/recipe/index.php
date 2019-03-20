<?php

use yii\helpers\Html;
use common\models\Recipe;


// get the models from dataProvider.
$models = $dataProvider->getModels();

$this->title = 'Recipes';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="recipe_category">
      <h1><?= $this->title ?></h1>
</div>

<div class="container recipes">
  <?php
    foreach($models as $model) {
  ?>

  <div class="row">
      <div class="thumbnail">
        <img src="<?=Yii::getAlias('@web') . '/' . 'uploads/' . $model->recipe_picture ?>"
          class="figure-img img-fluid img-rounded"/>
        <div class="caption"> <?= $model->recipe_title ?> </div>
      </div>
  </div>

  <?php } ?>
</div>
