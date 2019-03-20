<?php

use yii\helpers\Html;
use common\models\Recipe;


$this->title = 'Recipes';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="recipe_category">
      <h1><?= $this->title ?></h1>
</div>

<div class="row">
    <?=
    \yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
        'options' => [
            'tag' => 'div',
            'class' => 'list-wrapper',
            'id' => 'list-wrapper',
        ],
        'layout' => "{pager}\n{items}\n{summary}",
        'itemView' => '_list_item',
    ]);
    ?>

</div>
