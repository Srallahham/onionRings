<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Album;
use common\models\Unit;
use common\models\Category;
use yii\helpers\Chtml;
use common\wbraganca\src\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $model common\models\Recipe */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recipe-form">

		<div class="form-group">
			<?= Html::a('Create New Album', ['../album/create'], ['class' => 'btn btn-link']) ?>
		</div>
		<?php $form = ActiveForm::begin([
			'id' => 'dynamic-form',
			'options' => ['enctype' => 'multipart/form-data'],
		]); ?>
		<div class="row">
		  <?= $form->errorSummary($model); ?>

		  <?= $form->field($model, 'recipe_title')->textInput(['maxlength' => true]) ?>

		  <?php if ($model->isNewRecord): ?>
			  <?= $form->field($model, 'file')->fileInput() ?>
		  <?php endif; ?>
		</div>

		<div class="panel panel-default">
			<div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i> Ingredients</h4></div>
			<div class="panel-body">
				 <?php DynamicFormWidget::begin([
					'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
					'widgetBody' => '.container-items', // required: css class selector
					'widgetItem' => '.item', // required: css class
					'limit' => 10, // the maximum times, an element can be cloned (default 999)
					'min' => 1, // 0 or 1 (default 1)
					'insertButton' => '.add-item', // css class
					'deleteButton' => '.remove-item', // css class
					'model' => $modelsIngredient[0],
					'formId' => 'dynamic-form',
					'formFields' => [
						'ingredient_name',
						'ingredient_unit',
						'ingredient_quantity',
						'ingredient_desc',
					],
				]); ?>

					<div class="container-items"><!-- widgetContainer -->
						<?php foreach ($modelsIngredient as $i => $modelIngredient): ?>
							<div class="item panel panel-default"><!-- widgetBody -->
								<div class="panel-heading">
									<h3 class="panel-title pull-left">Ingredient</h3>
									<div class="pull-right">
										<button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
										<button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-body">
									<?php
										// necessary for update action.
										if (! $modelIngredient->isNewRecord) {
											echo Html::activeHiddenInput($modelIngredient, "[{$i}]id");
										}
									?>
									<div class="row">
										<div class="col-sm-3">
											<?= $form->field($modelIngredient, "[{$i}]ingredient_name")->textInput(['maxlength' => true]) ?>
										</div>
										<div class="col-sm-1">
											<?= $form->field($modelIngredient, "[{$i}]ingredient_unit")->textInput(['maxlength' => true]) ?>
										</div>
										<div class="col-sm-1">
											<?= $form->field($modelIngredient, "[{$i}]ingredient_quantity")->textInput(['maxlength' => true]) ?>
										</div>
										<div class="col-sm-6">
											<?= $form->field($modelIngredient, "[{$i}]ingredient_desc")->textInput(['maxlength' => true]) ?>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
                <?php DynamicFormWidget::end(); ?>
			</div>
        </div>
        <div class="row">
			<?= $form->field($model, 'recipe_preparation')->textarea(['rows' => 6]) ?>


			<?= $form->field($model, 'recipe_category')->DropDownList(
				ArrayHelper::map(Category::find()->all(), 'category_id', 'category_name'),
				['prompt' => 'Select Category']
			) ?>

			<?= $form->field($model, 'recipe_album')->DropDownList(
				ArrayHelper::map(Album::find()->all(), 'album_id', 'album_name'),
				['prompt' => 'Select Album']
			) ?>
        </div>

		<div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
		</div>

    <?php ActiveForm::end(); ?>
</div>
