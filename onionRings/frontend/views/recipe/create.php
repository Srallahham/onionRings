<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Recipe */

$this->title = 'Create Recipe';
$this->params['breadcrumbs'][] = ['label' => 'Recipes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recipe-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
<div class="row">
    <?php foreach($pictures as $picture) {
    ?>
    <div class="col-md-3">
        <div class="card">
            <img src="<?= Yii::getAlias('@web').'/'.$picture->picture_path; ?>" class="card-mg-top" width="100%">
            <div class="card-body">
                <h5 class="card-title"><?= $picture->picture_title; ?></h5>
            </div>
        </div>
    </div>
    <?php } ?>
</div>
