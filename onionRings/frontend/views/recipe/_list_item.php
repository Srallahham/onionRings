<?php
// _list_item.php
use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="col-md-4">
    <div class="thumbnail">
        <a href="<?= Url::toRoute(['recipe/view', 'id' => $model->recipe_id]) ?>">
            <img src="<?= Yii::getAlias('@web') . '/' . 'uploads/' . $model->recipe_picture ?>"
                 class="figure-img img-fluid img-rounded"/>
            <div class="caption"> <?= $model->recipe_title ?>
                , <?= $model->getCategoryName($model->recipe_category) ?> </div>
        </a>
    </div>

</div>
