<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Picture */

$this->title = $model->getAlbum($model->picture_album);
$this->params['breadcrumbs'][] = ['label' => 'Pictures', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="picture-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="thumbnail">
          <img src="<?=Yii::getAlias('@web') . '/' . $model->picture_path ?>"
            class="figure-img img-fluid img-rounded" width="100%"/>
          <div class="caption"> <?= $model->picture_album ?> </div>
        </div>

</div>
