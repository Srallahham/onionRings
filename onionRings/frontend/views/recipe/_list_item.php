<?php
// _list_item.php
use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="col-md-4">
    <div class="thumbnail">
        <a href="<?= Url::toRoute(['recipe/view', 'id' => $model->recipe_id]) ?>">
            <img src="<?= Yii::getAlias('@web') . '/' . 'uploads/' . $model->recipe_picture ?>"
                 class="figure-img img-fluid"/>
        </a>
        <div class="caption">
            <?= $model->recipe_title ?>,
            <?= $model->getCategoryName($model->recipe_category) ?>
            <div class="btn btn">
                <?= $model->getRecipeLikes($model->recipe_id) ?>
                <div class="glyphicon glyphicon-thumbs-up"></div>
            </div>
            <div class="btn btn">
                <?= intval($model->getRecipeRates($model->recipe_id)) ?>
                <div class="glyphicon glyphicon-star"></div>
            </div>
        </div>
    </div>
</div>
