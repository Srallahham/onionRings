<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\Unit;

$this->title = 'Recipes';
$this->params['breadcrumbs'][] = $this->title;

$form = ActiveForm::begin();
?>

<div class="recipe_category">
      <h1><?= $this->title ?></h1>
</div>

<?php
foreach ($model->recipeIngredients as $ingredient) {
?>

<div class="row">

  <div class="col-md-2"> <?= $ingredient->getIngredientName($ingredient->ingredient_id); ?> </div>

  <div class="col-md-2"> <?= $form->field($ingredient, 'ingredient_quantity')->textInput(['maxlength' => true]) ?> </div>

  <div class="col-md-2"> <?= $form->field($ingredient, 'ingredient_unit')->dropDownList(
    ArrayHelper::map(Unit::find()->all(), 'unit_id', 'unit_name')
    ) ?> </div>

  <div class="col-md-2"> <?= $form->field($ingredient, 'ingredient_desc')->textInput(['maxlength' => true]) ?> </div>

</div>
<?php
}
?>
  <div class="form-group">
      <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
  </div>
<?php ActiveForm::end(); ?>
