<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Recipe */

$this->title = $model->recipe_title;
$this->params['breadcrumbs'][] = ['label' => 'Recipes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
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
        </div>
        <div class="row">
            <div>
                <?= $model->recipe_preparation ?>
            </div>
        </div>

</div>
