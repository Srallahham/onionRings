<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $searchModel app\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Administrators';
$this->params['breadcrumbs'][] = $this->title;

?>
<!------------------------------------------------------------------>

<div class="container">
  <h1>Technia <small>Control Panel</small></h1>
  <div class="panel-group col-lg-2" id="accordion">
      <!-- INCLUDE THE SAIDEBAR FILE -->
      <?php require __dir__ . '/../site/sidebar.php'; ?>
  </div><!-- End panel-group -->
  <div class="col-lg-10">
      <div class="users-admins">
          <h4><?= Html::encode($this->title) ?></h4>
          <p>
              <?= Html::a('Create Admins', ['create'], ['class' => 'btn btn-success']) ?>
          </p>

          <?= GridView::widget([
              'dataProvider' => $dataProvider,
              'filterModel' =>$searchModel,
              'columns' => [
                  ['class' => 'yii\grid\SerialColumn'],

                  //'user_id',
                  'user_name',
                  'user_email:email',
                  'user_password',
                  'permission_name',

                  ['class' => 'yii\grid\ActionColumn'],
              ],
          ]); ?>
      </div>

  </div><!-- End col-lg-9 -->
</div><!-- End container -->

<!------------------------------------------------------------------>
