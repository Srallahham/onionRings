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

<div class="row">
  <?php
    foreach($models as $model) {
  ?>

    <div class="col-md-4">
      <div class="thumbnail">
        <img src="<?=Yii::getAlias('@web') . '/' . 'uploads/' . $model->recipe_picture ?>"
          class="figure-img img-fluid img-rounded"/>
        <div class="caption"> <?= $model->recipe_title ?>, <?= $model->getCategoryName($model->recipe_category) ?> </div>
      </div>
    </div>

  <?php } ?>
</div>
