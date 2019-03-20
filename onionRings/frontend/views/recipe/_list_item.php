<div class="col-md-4">
    <div class="thumbnail">
        <img src="<?=Yii::getAlias('@web') . '/' . 'uploads/' . $model->recipe_picture ?>"
             class="figure-img img-fluid img-rounded"/>
        <div class="caption"> <?= $model->recipe_title ?>, <?= $model->getCategoryName($model->recipe_category) ?> </div>
    </div>
</div>
