<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="recipe-form">

    <?php $form = ActiveForm::begin([
      'id' => $model->formName(),
      'options' => ['enctype' => 'multipart/form-data'],
    ]); ?>

    <div class="row">
      <div class="col-md-2">
        <?= Html::submitButton('Comment', ['class' => 'btn btn-success']) ?>
      </div>
      <div class="col-md-9">
        <?= $form->field($model, 'comment')->textarea(['maxlength' => true])->label(false) ?>
      </div>
      <?= $form->field($model, 'comment_owner')->hiddenInput(['value'=>yii::$app->user->identity->getId()])->label(false); ?>
      <?= $form->field($model, 'comment_recipe')->hiddenInput(['value'=>$recipe_id])->label(false); ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
<?php

$script = <<< JS

$('form#{$model->formName()}').on('beforeSubmit', function(e)
{

   var \$form = $(this);
   $.post(
      \$form.attr("action"),
      \$form.serialize()
   )
   .done(function(result){
      $(document).find('#modal').modal('hide');
      $.pjax.reload({container:'#comments'});
   }).fail(function()
   {
      console.log("Server error :(");
   });
   return false;
});

JS;
$this->registerJs($script);
?>
